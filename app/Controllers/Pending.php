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

    public function processMembership()
    {
        helper(['form', 'audit']);

        if(preg_match('/^(09\d{9}|\+639\d{9})$/', $this->request->getPost('contact')) !== 1) {
            return redirect()->back()->with('error', 'Invalid contact number format. Please use a valid mobile number.');
        }

        $pendingIdnumber = $this->request->getPost('Idnumber');

        // Check if the ID number is already in the database
        if ($this->pendingModel->where('pending_Idnumber', $pendingIdnumber)->first()) {
            return redirect()->back()->with('error', 'ID number already exists. Please use a different ID number.');
        }

        $data = [
            'pending_lastname'      => $this->request->getPost('lastname'),
            'pending_firstname'     => $this->request->getPost('firstname'),
            'pending_age'           => $this->request->getPost('age'),
            'pending_gender'        => $this->request->getPost('gender'),
            'pending_Idnumber'      => $this->request->getPost('Idnumber'),
            'pending_course'        => $this->request->getPost('course'),
            'pending_section'       => $this->request->getPost('section'),
            'pending_address'       => $this->request->getPost('address'),
            'pending_contact'       => $this->request->getPost('contact'),
            'pending_gradelevel'    => $this->request->getPost('gradelevel'),
            'pending_gmail'         => $this->request->getPost('gmail'),
        ];

        log_audit(
            'Membership Registration', 
            'User ID: ' . session()->get('user_id') . ' applied for membership'
        );

        $this->pendingModel->save($data);

        return redirect()->to('/')->with('success', 'Registration successfully, Wait for approval!');
    }
}

