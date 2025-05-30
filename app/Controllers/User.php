<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    private $userModel;

    public function __construct()
    {
        // Load the UserModel to interact with user data
        $this->userModel = new UserModel();
    }

    public function index()
    {
        if(!session()->get('is_logged_in')) {
            return redirect()->to('/login')->with('error', 'Please log in to access this page.');
        }

        if(session()->get('user_role') !== 'Super Admin' && session()->get('user_role') !== 'Admin') {
            return redirect()->to('/')->with('error', 'You do not have permission to access this page.');
        }

        $user = $this->userModel->find(session()->get('user_id'));

        if (!$user) {
            // If the user is not found, redirect to the home page with an error message
            return redirect()->to('/')->with('error', 'User not found.');
        }

        // This method can be used to display user-related information or redirect to a specific view.
        return view('profile', ['user' => $user]);
    }

    public function updateProfile()
    {
        helper('audit');
        if(!session()->get('is_logged_in')) {
            return redirect()->to('/login')->with('error', 'Please log in to access this page.');
        }

        if(session()->get('user_role') !== 'Super Admin' && session()->get('user_role') !== 'Admin') {
            return redirect()->to('/')->with('error', 'You do not have permission to access this page.');
        }

        $userId = session()->get('user_id');
        
        $validation = $this->validate([
            'firstname' => 'required|alpha_space|min_length[2]',
            'lastname'  => 'required|alpha_space|min_length[2]',
            'course'    => 'required',
            'gradelevel' => 'required|integer',
            'studentid' => 'required|numeric|exact_length[7]',
            'section'   => 'required',
            'email'    => 'required|valid_email|',
        ]);

        if (!$validation) {
            return redirect()->to('/admin/psits/profile')
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }
        

        // Validate and update user data
        $data = [
            'data-user-firstname' => $this->request->getPost('firstname'),
            'data-user-lastname'  => $this->request->getPost('lastname'),
            'data-user-course'    => $this->request->getPost('course'),
            'data-user-gradelevel' => $this->request->getPost('gradelevel'),
            'data-user-student-id' => $this->request->getPost('studentid'), 
            'data-user-section'   => $this->request->getPost('section'),  
            'data-user-email'    => $this->request->getPost('email'),
        ];

        log_audit('Profile Update', 'User ID: ' . $userId . ' updated their profile information.');

        $this->userModel->update($userId, $data);

        return redirect()->to('/admin/psits/dashboard')->with('success', 'Profile updated successfully.');
    }

    public function changePassword()
    {
        if(!session()->get('is_logged_in')) {
            return redirect()->to('/login')->with('error', 'Please log in to access this page.');
        }

        if(session()->get('user_role') !== 'Super Admin' && session()->get('user_role') !== 'Admin') {
            return redirect()->to('/')->with('error', 'You do not have permission to access this page.');
        }

        return view('change-password');
        // Logic for changing password goes here
        // This can include form validation, updating the password in the database, etc.
    }
    
    public function updatePassword()
    {
        helper('audit');
        
        if(!session()->get('is_logged_in')) {
            return redirect()->to('/login')->with('error', 'Please log in to access this page.');
        }

        if(session()->get('user_role') !== 'Super Admin' && session()->get('user_role') !== 'Admin') {
            return redirect()->to('/')->with('error', 'You do not have permission to access this page.');
        }

        $userId = session()->get('user_id');

        $validation = $this->validate([
            'password' => 'required|min_length[8]',
            'cpassword' => 'required|matches[password]',
        ]);

        if (!$validation) {
            return redirect()->to('/admin/psits/change-password')
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        // Update the password
        $data = [
            'data-user-password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];

        log_audit('Password Change', 'User ID: ' . $userId . ' changed their password.');

        $this->userModel->update($userId, $data);

        return redirect()->to('/admin/psits/dashboard')->with('success', 'Password updated successfully.');
    }
}