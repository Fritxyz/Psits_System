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
        $data['psits_members'] = $this->memberModel->findAll();
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
        $userId = session()->get('user_id');
        $pending = $this->pendingModel->where('pending_Idnumber', $userId)->first();

        if ($pending) {
            return redirect()->to('/')->with('error', 'You have already applied for membership. Please wait for approval.');
        }


        $user = $this->userModel->find($userId);

        return view('Membership/membership', ['user' => $user]);
    }

    public function pendingMember()
    {
        $pending = new PendingModel();
        $data['pending_members'] = $pending->findAll();
        return view('pendingMember', $data);
    }

    public function pendingUsers()
    {
        $data['users'] = $this->pendingModel->findAll();
        return view('admin/pending_users', $data);
    }

    public function approveUser($id)
    {
        // Fetch user data from pending_users
        $user = $this->pendingModel->find($id);

        if ($user) {
            // Insert into the main users table
            $this->memberModel->save([
                'member-lastname' => $user['pending_lastname'],
                'member-firstname' => $user['pending_firstname'],
                'member-middlename' => $user['pending_middlename'],
                'member-gmail' => $user['pending_gmail'],
                'member-gender' => $user['pending_gender'],
                'member-age' => $user['pending_age'],
                'member-course' => $user['pending_course'],
                'member-section' => $user['pending_section'],
                'member-gradelevel'=> $user['pending_gradelevel'],
                'member-contact'=> $user['pending_contact'],
                'member-address'=> $user['pending_address'],
                'member-id-number'=> $user['pending_Idnumber'],
            ]);

            // Delete from pending_users
            $this->pendingModel->delete($id);
        }

        return redirect()->to('pendingMember')->with('success', 'Member approved successfully');
    }

    public function deleteMember($id = null)
    {
        $this->memberModel->delete($id);
        session()->setFlashdata('delete', 'Deleted successfully');
        return redirect()->to('/psits-members');
    }

    public function addMember()
    {
        return view('addMember');
    }

    public function addingMember()
    {
      $memberName = $this->request->getVar('member-lastname');
      $memberGender = $this->request->getVar('member-gender');
      $memberCourse = $this->request->getVar('member-course');
      $memberSection = $this->request->getVar('member-section');
      $memberGradelevel = $this->request->getVar('member-gradelevel');
      $memberContact = $this->request->getVar('member-contact');
      $memberAddress = $this->request->getVar('member-address');
      $memberIdNumber = $this->request->getVar('member-id-number');
      $memberGmail = $this->request->getVar('member-gmail');
      $memberFirstname = $this->request->getVar('member-firstname');
      $memberMiddlename = $this->request->getVar('member-middlename');
      $memberAge = $this->request->getVar('member-age');
      $id = $this->request->getVar('id');

      $data = [
          'member-lastname' => $memberName,
          'member-gender' => $memberGender,
          'member-course' => $memberCourse,
          'member-section' => $memberSection,
          'member-gradelevel' => $memberGradelevel,
          'member-contact' => $memberContact,
          'member-address' => $memberAddress,
          'member-id-number' => $memberIdNumber,
          'member-gmail' => $memberGmail,
          'member-firstname' => $memberFirstname,
          'member-middlename' => $memberMiddlename,
          'member-age' => $memberAge,       
      ];

      $this->memberModel->insert($data);
      
      session()->setFlashdata('success', 'Added successfully');

      return redirect()->to('/psits-members'); 
    }
    
    public function updateMember($id = null)
    {
        $data['psits_members'] = $this->memberModel->find($id);
        return view('updateMember', $data);
    }

    public function updating()
    {
        $memberLastName = $this->request->getVar('member-lastname');
        $memberFirstname = $this->request->getVar('member-firstname');
        $memberMiddlename = $this->request->getVar('member-middlename');
        $memberAge = $this->request->getVar('member-age');
        $memberGender = $this->request->getVar('member-gender');
        $memberCourse = $this->request->getVar('member-course');
        $memberSection = $this->request->getVar('member-section');
        $memberGradelevel = $this->request->getVar('member-gradelevel');
        $memberContact = $this->request->getVar('member-contact');
        $memberAddress = $this->request->getVar('member-address');
        $memberIdNumber = $this->request->getVar('member-id-number');
        $memberGmail = $this->request->getVar('member-gmail');
        $id = $this->request->getVar('id');

        $data = [
            'member-lastname' => $memberLastName,
            'member-firstname' => $memberFirstname,
            'member-middlename' => $memberMiddlename,
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

      $this->memberModel->update($id,$data);
      
      session()->setFlashdata('success', 'Updated successfully');
      return redirect()->to('/psits-members');
    }
}  