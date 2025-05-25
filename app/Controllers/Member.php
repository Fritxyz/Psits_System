<?php

namespace App\Controllers;
use App\Models\MemberModel;
use App\Models\PendingModel;

class Member extends BaseController
{
    public function psitsMembers()
    {
        $mm = new MemberModel();
        $data['psits_members'] = $mm->findAll();
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
        $pendingUserModel = new PendingModel();
        $data['users'] = $pendingUserModel->findAll();
        return view('admin/pending_users', $data);
    }

    public function approveUser($id)
    {
        $pending = new PendingModel();
        $member = new MemberModel();

        // Fetch user data from pending_users
        $user = $pending->find($id);

        if ($user) {
            // Insert into the main users table
            $member->save([
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
            $pending->delete($id);
        }

        return redirect()->to('pendingMember')->with('success', 'Member approved successfully');
    }

   

    public function delete($id = null)
    {
        $mm = new MemberModel();
        $mm->delete($id);
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

      $mm = new MemberModel();
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
      $mm->insert($data);
      
      session()->setFlashdata('success', 'Added successfully');
      return redirect()->to('/psits-members');
        
    }
    
    public function updateMember($id = null)
    {
        $mm = new MemberModel();
        $data['psits_members'] = $mm->find($id);
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

      $mm = new MemberModel();
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
      $mm->update($id,$data);
      
      session()->setFlashdata('success', 'Updated successfully');
      return redirect()->to('/psits-members');

    }

}  