<?php

namespace App\Controllers;
use App\Models\MemberModel;
use App\Models\PendingModel;

class Member extends BaseController
{
    private $memberModel;
    private $pendingModel;

    public function __construct()
    {
        $this->memberModel = new MemberModel();
        $this->pendingModel = new PendingModel();
    }

    public function psitsMembers()
    {
        $data['psits_members'] = $this->memberModel->findAll();
        return view('psits-members', $data);
    }

    public function membership()
    {
        helper(['form']);
        return view('membership');
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
                'member-gender' =>   $user['pending_gender'],
                'member-age' =>  $user['pending_age'],
                'member-course' => $user['pending_course'],
                'member-section' => $user['pending_section'],
                'member-gradelevel'  =>   $user['pending_gradelevel'],
                'member-contact'=> $user['pending_contact'],
                'member-address'  =>   $user['pending_address'],
                'member-id-number'=>  $user['pending_Idnumber'],
            ]);

            // Delete from pending_users
            $this->pendingModel->delete($id);
        }

        return redirect()->to('pendingMember')->with('success', 'Member approved successfully');
    }

    public function delete($id = null)
    {
        $this->memberModel->delete($id);
        session()->setFlashdata('delete', 'Deleted successfully');
        return redirect()->to('/psits-members');
    }

    public function AddMember()
    {
        return view('addMember');
    }

    public function adding()
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
      $memberName = $this->request->getVar('member-lastname');
      $memberGender = $this->request->getVar('member-gender');
      $memberCourse = $this->request->getVar('member-course');
      $memberSection = $this->request->getVar('member-section');
      $memberGradelevel = $this->request->getVar('member-gradelevel');
      $memberContact = $this->request->getVar('member-contact');
      $memberAddress = $this->request->getVar('member-address');
      $memberIdNumber = $this->request->getVar('member-id-number');
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
         
      ];

      $this->memberModel->update($id,$data);
      
      session()->setFlashdata('success', 'Updated successfully');
      return redirect()->to('/psits-members');
    }

}  