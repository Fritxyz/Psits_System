<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function login()
    {
        return view('login');
    }

    public function processLogin()
    {  
        // Process login form submission
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        
        // Validation
        $validation = service('validation');
        $validation->setRules([
            'email' => 'required|valid_email',
            'password' => 'required'
        ]);
        
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->to('/login')->withInput()->with('error', $validation->getErrors());
        }
        
        // Check user credentials
        $user = $this->userModel->where('data-user-email', $email)->first();
        
        if (!$user) {
            return redirect()
                ->to('/login')
                ->withInput()
                ->with('error', 'Invalid password or Email');
        }
        
        // Verify user is verified
        if (!$user['data-user-is-verified']) {
            return redirect()
                ->to('/login')
                ->withInput()
                ->with('error', 'Please verify your email before logging in');
        }
        
        // Verify password
        if (!password_verify($password, $user['data-user-password'])) {
            return redirect()
                ->to('/login')
                ->withInput()
                ->with('error', 'Invalid password or Email');
        }
        
        // Set session data
        $session = session();
        $sessionData = [
            'user_id' => $user['data-user-id'],
            'user_email' => $user['data-user-email'],
            'logged_in' => TRUE,
        ];

        $session->set($sessionData);
        
        
        return redirect()->to('/psits-dashboard');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        
        return redirect()->to('/login');
    }

    public function processRegister()
    {
        $user_model = new UserModel();

        $validation = $this->validate([
            'email'    => 'required|valid_email|is_unique[users.data-user-email]',
            'password' => 'required|min_length[8]',
            'cpassword' => 'required|matches[password]',
        ]);

        if (!$validation) {
            // Return validation errors
            return redirect()->to('/register')
                ->withInput()
                ->with('errors', $this->validator->getErrors());  
                
        }
        $otp = random_int(100000, 999999); // Generate 6-digit OTP
        $data = [   
            'data-user-email'    => $this->request->getPost('email'),
            'data-user-password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'data-user-otp' => (string) $otp,
            'data-user-otp-expires' => date('Y-m-d H:i:s', strtotime('+15 minutes')), // OTP expires in 15 minutes
            // 'data-user-cpassword' => $this->request->getPost('cpassword'),
        ];

        if ($user_model->save($data)) {

            $email = \Config\Services::email();
            $email->setTo($this->request->getPost('email'));
            $email->setSubject('Your OTP Code');
            $email->setMessage("Your OTP code is: $otp. It expires in 15 minutes.");
            $email->send();

            return redirect()->to('/otp')
               ->with('success', 'Registration Successful')
               ->with('email', $this->request->getPost('email')); // Pass email to OTP page
            // return redirect()->to('/otp')->with('success', 'Registration Successful');
        } else {
            return redirect()->to('/register')->with('errors', $user_model->errors());
        }
    }

    public function otp()   
    {
        return view('otp');
    }

    public function verifyOtp()
    {
        $user_model = new UserModel();

        $email = $this->request->getPost('email');
        $otp = $this->request->getPost('otp');

        $user = $user_model->where('data-user-email', $email)->first(); // Keep hyphenated format

        if ($user && $user['data-user-otp'] === $otp && strtotime($user['data-user-otp-expires']) > time()) {
            // OTP is valid; update the user as verified
            $user_model->update($user['data-user-id'], [
                'data-user-otp' => null, 
                'data-user-otp-expires' => null,
                'data-user-is-verified' => 1 // Add verification status with hyphen
            ]);

            return redirect()->to('/login')->with('success', 'Email verification successful. You can now log in.');
        } else {
            return redirect()->to('/otp')
                ->with('error', 'Invalid or expired OTP.')
                ->with('email', $email); // Keep email for retry
        }
    }
}