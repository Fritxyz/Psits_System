<?php

namespace App\Controllers;
use App\Models\MemberModel;
use App\Models\PendingModel;
use App\Models\UserModel;

class Member extends BaseController
{
    private $memberModel;
    private $pendingModel;
    private $userModel;

    public function __construct()
    {
        $this->memberModel = new MemberModel();
        $this->pendingModel = new PendingModel();
        $this->userModel = new UserModel();
    }

    public function psitsMembers()
    {
        if(!session()->get('is_logged_in')) {
            return redirect()->to('/login')->with('error', 'Please log in to access this page.');
        }

        if(session()->get('user_role') !== 'Super Admin' && session()->get('user_role') !== 'Admin') {
            return redirect()->to('/')->with('error', 'You do not have permission to access this page.');
        }

        // $data['psits_members'] = $this->memberModel->findAll();
        $data['psits_members'] = $this->memberModel->getMembersWithRoles();
        return view('psits-members', $data);
    }

    public function membership()
    {
        if (!session()->get('is_logged_in')) {
            return redirect()->to('/login')->with('error', 'Please log in to access this page.');
        }

        if (session()->get('user_role') !== 'Student') {
            return redirect()->to('/')->with('error', 'You do not have permission to access this page.');
        }


        // Check if the user has already applied for membership
        $userStudentId = $this->userModel
            ->select('data-user-student-id')
            ->where('data-user-id', session()->get('user_id'))
            ->first()['data-user-student-id'] ?? null;

        $pending = $this->pendingModel->where('pending_Idnumber', $userStudentId)->first();

        if ($pending) {
            return redirect()->to('/')->with('error', 'You have already applied for membership. Please wait for approval.');
        }

        $membership = $this->memberModel
            ->where('member-id-number', $userStudentId)
            ->first();

        if ($membership) {
            return redirect()->to('/')->with('error', 'You are already a member.');
        }


        $user = $this->userModel->find(session()->get('user_id'));
        
        if (!$user) {
            return redirect()->to('/')->with('error', 'User not found.');
        }

        return view('membership', ['user' => $user]);
    }

    public function pendingMember()
    {
        if(!session()->get('is_logged_in')) {
            return redirect()->to('/login')->with('error', 'Please log in to access this page.');
        }

        if(session()->get('user_role') !== 'Super Admin' && session()->get('user_role') !== 'Admin') {
            return redirect()->to('/')->with('error', 'You do not have permission to access this page.');
        }

        $data['pending_members'] = $this->pendingModel->findAll();

        return view('pending-members', $data);
    }

    public function pendingUsers()
    {
        $data['users'] = $this->pendingModel->findAll();
        return view('admin/pending_users', $data);
    }

    public function approveMember($id = null)
    {
        helper(['audit']);
        if (!session()->get('is_logged_in')) {
            return redirect()->to('/login')->with('error', 'Please log in to access this page.');
        }

        if (session()->get('user_role') !== 'Super Admin' && session()->get('user_role') !== 'Admin') {
            return redirect()->to('/')->with('error', 'You do not have permission to access this page.');
        }

        $user = $this->pendingModel->find($id);


        if (!$user) {
            return redirect()->back()->with('error', 'Pending member not found.');
        }

        // Save to member table
        $saveResult = $this->memberModel->save([
            'member-lastname' => $user['pending_lastname'],
            'member-firstname' => $user['pending_firstname'],
            'member-gmail' => $user['pending_gmail'],
            'member-gender' => $user['pending_gender'],
            'member-age' => $user['pending_age'],
            'member-course' => $user['pending_course'],
            'member-section' => $user['pending_section'],
            'member-gradelevel' => $user['pending_gradelevel'],
            'member-contact' => $user['pending_contact'],
            'member-address' => $user['pending_address'],
            'member-id-number' => $user['pending_Idnumber'],
        ]);

        if (!$saveResult) {
            return redirect()->back()->with('error', 'Failed to save member: ' . json_encode($this->memberModel->errors()));
        }

        $foundUser = $this->userModel
            ->where('data-user-student-id', $user['pending_Idnumber'])
            ->first();

        if (!$foundUser) {
            return redirect()->back()->with('error', 'No matching user found with student ID: ' . $user['pending_Idnumber']);
        }

        $userId = $foundUser['data-user-id']; // ✅ correct if you're using hyphens
        $this->userModel->update($userId, ['data-user-role' => 'Admin']);

        log_audit(
            'Admin approved a pending member',
            'User with ID ' . session()->get('user_id') . ' approved member with ID: ' . $id
        );

        // Delete from pending
        $this->pendingModel->delete($id);

        return redirect()->to('/admin/psits/members')->with('success', 'Member approved successfully.');
    }


    public function rejectMember($id = null)
    {
        helper(['audit']);

        if(!session()->get('is_logged_in')) {
            return redirect()->to('/login')->with('error', 'Please log in to access this page.');
        }

        if(session()->get('user_role') !== 'Super Admin' && session()->get('user_role') !== 'Admin') {
            return redirect()->to('/')->with('error', 'You do not have permission to access this page.');
        }

        log_audit(
            'Admin rejected a pending member',
            'User with ID ' . session()->get('user_id') . ' rejected member with ID: ' . $id
        );

        $this->pendingModel->delete($id);
        session()->setFlashdata('delete', 'Rejected successfully');
        return redirect()->to('/admin/psits/pending-members');
    }

    public function deleteMember($id = null)
    {
        if(!session()->get('is_logged_in')) {
            return redirect()->to('/login')->with('error', 'Please log in to access this page.');
        }
        if(session()->get('user_role') !== 'Super Admin' && session()->get('user_role') !== 'Admin') {
            return redirect()->to('/')->with('error', 'You do not have permission to access this page.');
        }

        $member = $this->memberModel->find($id);

        if (!$member) {
            return redirect()->back()->with('error', 'Member not found.');
        }

        // Check if the member is associated with a user
        $user = $this->userModel->where('data-user-student-id', $member['member-id-number'])->first();

        if ($user) {
            // Update the user's role to 'Student' or any other role you prefer
            $this->userModel->update($user['data-user-id'], ['data-user-role' => 'Student']);
            session()->set('user_role', 'Student'); // Update session role
        }

        // Delete the member
        helper('audit');

        log_audit(
            'Admin deleted a member',
            'User with ID ' . session()->get('user_id') . ' deleted member with ID: ' . $id
        );

        $this->memberModel->delete($id);

        log_audit(
            'Admin deleted a member',
            'User with ID ' . session()->get('user_id') . ' deleted member with ID: ' . $id
        );  
        
        session()->setFlashdata('delete', 'Deleted successfully');
        return redirect()->to('/admin/psits/members');
    }

    public function addMember()
    {
        if(!session()->get('is_logged_in')) {
            return redirect()->to('/login')->with('error', 'Please log in to access this page.');
        }

        if(session()->get('user_role') !== 'Super Admin' && session()->get('user_role') !== 'Admin') {
            return redirect()->to('/')->with('error', 'You do not have permission to access this page.');
        }

        return view('add-member');
    }

    public function addingMember()
    {
        if(!session()->get('is_logged_in')) {
            return redirect()->to('/login')->with('error', 'Please log in to access this page.');
        }

        if(session()->get('user_role') !== 'Super Admin' && session()->get('user_role') !== 'Admin') {
            return redirect()->to('/')->with('error', 'You do not have permission to access this page.');
        }
        
        helper('audit');

        // todo: check if the user is registered before adding a member
        $userStudentId = $this->request->getVar('member-id-number');

        if (!$this->userModel->where('data-user-student-id', $userStudentId)->first()) {
            return redirect()->back()->with('error', 'The user with ID ' . $userStudentId . ' is not registered. Please register the user first.')->withInput();
        }

        if($this->pendingModel->where('pending_Idnumber', $userStudentId)->first()) {
            return redirect()->back()->with('error', 'The user with ID ' . $userStudentId . ' is already pending approval.')->withInput();
        }


        $validation = $this->validate([
            'member-firstname' => 'required|alpha_space|min_length[2]',
            'member-lastname'  => 'required|alpha_space|min_length[2]',
            'member-age' => 'required|integer',
            'member-gender' => 'required|in_list[Male, Female, Other]',
            'member-course'    => 'required',
            'member-section'   => 'required',
            'member-gradelevel' => 'required|integer',
            'member-id-number' => 'required|numeric|exact_length[7]|is_unique[psits_members.member-id-number]',
            'member-gmail'    => 'required|valid_email|',
            'member-contact' => 'required|regex_match[/^(09\d{9}|\+639\d{9})$/]',
        ]);

        if (!$validation) {
            return redirect()
            ->to('/admin/psits/members/' . $this->request->getVar('id'))
            ->withInput()
            ->with('errors', $this->validator->getErrors());
        }

        $memberLastName = $this->request->getVar('member-lastname');
        $memberGender = $this->request->getVar('member-gender');
        $memberCourse = $this->request->getVar('member-course');
        $memberSection = $this->request->getVar('member-section');
        $memberGradelevel = $this->request->getVar('member-gradelevel');
        $memberContact = $this->request->getVar('member-contact');
        $memberAddress = $this->request->getVar('member-address');
        $memberIdNumber = $this->request->getVar('member-id-number');
        $memberGmail = $this->request->getVar('member-gmail');
        $memberFirstname = $this->request->getVar('member-firstname');
        $memberAge = $this->request->getVar('member-age');

        $data = [
            'member-lastname' => $memberLastName,
            'member-gender' => $memberGender,
            'member-course' => $memberCourse,
            'member-section' => $memberSection,
            'member-gradelevel' => $memberGradelevel,
            'member-contact' => $memberContact,
            'member-address' => $memberAddress,
            'member-id-number' => $memberIdNumber,
            'member-gmail' => $memberGmail,
            'member-firstname' => $memberFirstname,
            'member-age' => $memberAge,       
        ];

        // change the role of the user to 'Admin' or 'Member' based on your requirements
        $user = $this->userModel->where('data-user-student-id', $memberIdNumber)->first()['data-user-id'] ?? null;

        if (!$user) {
            return redirect()->back()->with('error', 'User not found. Please register the user first.')->withInput();
        }

        $this->userModel->update($user, ['data-user-role' => 'Admin']);
        $this->memberModel->insert($data);

        log_audit(
            'Admin added a member',
            'User with ID ' . session()->get('user_id') . ' added a member'
        );
      
        session()->setFlashdata('success', 'Added successfully');

        return redirect()->to('/admin/psits/members'); 
    }
    
    public function updateMember($id = null)
    {
        if(!session()->get('is_logged_in')) {
            return redirect()->to('/login')->with('error', 'Please log in to access this page.');
        }

        if(session()->get('user_role') !== 'Super Admin' && session()->get('user_role') !== 'Admin') {
            return redirect()->to('/')->with('error', 'You do not have permission to access this page.');
        }

        // $data['psits_members'] = $this->memberModel->find($id);

        $data['psits_member'] = $this->memberModel->getMembersWithRoles();

        $data['psits_members'] = $data['psits_member'][0];

        // dd($data['psits'][0]['id']);
        // dd($data['psits_members'][0]['id']);
        return view('update-member', $data);
    }

    public function updatingMember($memberId = null)
    {
        helper(['form', 'audit']);

        if(!session()->get('is_logged_in')) {
            return redirect()->to('/login')->with('error', 'Please log in to access this page.');
        }

        if(session()->get('user_role') !== 'Super Admin' && session()->get('user_role') !== 'Admin') {
            return redirect()->to('/')->with('error', 'You do not have permission to access this page.');
        }

        $validation = $this->validate([
            'member-firstname' => 'required|alpha_space|min_length[2]',
            'member-lastname'  => 'required|alpha_space|min_length[2]',
            'member-age' => 'required|integer',
            'member-gender' => 'required|in_list[Male, Female, Other]',
            'member-course'    => 'required',
            'member-section'   => 'required',
            'member-gradelevel' => 'required|integer',
            'member-id-number' => 'required|numeric|exact_length[7]',
            'member-gmail'    => 'required|valid_email|',
            'member-contact' => 'required|regex_match[/^(09\d{9}|\+639\d{9})$/]',  
            'role' => 'required|in_list[Admin, Student, Super Admin]',
        ]);
    
        if (!$validation) {
            return redirect()
            ->to('/admin/psits/members/' . $this->request->getVar('id'))
            ->withInput()
            ->with('errors', $this->validator->getErrors());

        }

        $memberLastName = $this->request->getVar('member-lastname');
        $memberFirstname = $this->request->getVar('member-firstname');
        $memberAge = $this->request->getVar('member-age');
        $memberGender = $this->request->getVar('member-gender');
        $memberCourse = $this->request->getVar('member-course');
        $memberSection = $this->request->getVar('member-section');
        $memberGradelevel = $this->request->getVar('member-gradelevel');
        $memberContact = $this->request->getVar('member-contact');
        $memberAddress = $this->request->getVar('member-address');
        $memberIdNumber = $this->request->getVar('member-id-number');
        $memberGmail = $this->request->getVar('member-gmail');
        $role = $this->request->getVar('role');

        $data = [
            'member-lastname' => $memberLastName,
            'member-firstname' => $memberFirstname,
            'member-age' => $memberAge,
            'member-gender' => $memberGender,
            'member-course' => $memberCourse,
            'member-section' => $memberSection,
            'member-gradelevel' => $memberGradelevel,
            'member-contact' => $memberContact,
            'member-address' => $memberAddress,
            'member-id-number' => $memberIdNumber,
            'member-gmail' => $memberGmail,
        ];

        // change the role of the user to 'Admin' or 'Member' based on your requirements
        $user = $this->userModel->where('data-user-student-id', $memberIdNumber)->first()['data-user-id'] ?? null;

        if (!$user) {
            return redirect()->back()->with('error', 'User not found. Please register the user first.')->withInput();
        } else {
            $this->userModel->update($user, ['data-user-role' => $role]);
            session()->set('user_role', $role);
        }

        log_audit(
            'Admin updated a member',
            'User with ID ' . session()->get('user_id') . ' updated member with ID: ' . $memberId
        );

        $this->memberModel->update($memberId,$data);
      
        session()->setFlashdata('success', 'Updated successfully');
        return redirect()->to('/admin/psits/members');
    }
}  