<?php 

namespace App\Controllers;

use App\Models\PendingModel;

class Pending  extends BaseController
{
    private $pendingModel;

    public function __construct()
    {
        $this->pendingModel = new PendingModel();
    }

    public function ProcessMembership()
    {
        helper(['form']);

        if (strlen($this->request->getPost('password')) < 8) {
            return redirect()->back()->with('error', 'Password must be at least 8 characters long.');
        }
        
        // Validate Password Match (optional, but recommended)
        if ($this->request->getPost('password') !== $this->request->getPost('cpassword')) {
            return redirect()->back()->with('error', 'Passwords do not match');
        }

        $pendingIdnumber = $this->request->getPost('Idnumber');

        // Check if the ID number is already in the database
        $pendingUserModel = new PendingModel();
        if ($pendingUserModel->where('pending_Idnumber', $pendingIdnumber)->first()) {
            return redirect()->back()->with('error', 'ID number already exists. Please use a different ID number.');
        }

        $data = [
            'pending_lastname'      => $this->request->getPost('lastname'),
            'pending_firstname'     => $this->request->getPost('firstname'),
            'pending_middlename'    => $this->request->getPost('middlename'),
            'pending_age'           => $this->request->getPost('age'),
            'pending_gender'        => $this->request->getPost('gender'),
            'pending_Idnumber'      => $this->request->getPost('Idnumber'),
            'pending_course'        => $this->request->getPost('course'),
            'pending_section'       => $this->request->getPost('section'),
            'pending_address'       => $this->request->getPost('address'),
            'pending_contact'       => $this->request->getPost('contact'),
            'pending_gradelevel'    => $this->request->getPost('gradelevel'),
            'pending_username'      => $this->request->getPost('username'),
            'pending_password'      => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'pending_gmail'         => $this->request->getPost('gmail'),
        ];

        $this->pendingModel->save($data);

        return redirect()->to('/login')->with('success', 'Registration successfully, Wait for approval!');
    }
}

