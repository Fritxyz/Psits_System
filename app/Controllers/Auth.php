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
        if(session()->get('is_logged_in')) {
            // lagyan nested if based sa role
            return redirect()->to('/');
        }

        return view('login');
    }

    public function processLogin()
    {  
        if (session()->get('is_logged_in')) {
            return redirect()->to('/');
        }

        helper('audit');

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
            return redirect()
                ->to('/login')
                ->withInput()
                ->with('error', $validation->getErrors());
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

        // Log the login attempt
        
        
        // Set session data
        $session = session();

        $sessionData = [
            'user_id' => $user['data-user-id'],
            'user_email' => $user['data-user-email'],
            'is_logged_in' => TRUE,
            'user_role' => $user['data-user-role']
        ];

        

        $session->set($sessionData);

        log_audit(
            'User logged in',
            'User with ID ' . $user['data-user-id'] . ' logged in successfully.'
        );
        
        return redirect()->to('/');
    }

    public function register()
    {
        if (session()->get('is_logged_in')) {
            if(session()->get('user_role') === 'officer') {
                return redirect()->to('/psits-dashboard');
            } else {
                return redirect()->to('/');
            }
        }

        return view('register');
    }

    public function logout()
    {
        if (!session()->get('is_logged_in')) {
            return redirect()->to('/login')->with('error', 'You are not logged in.');
        }

        helper('audit');

        $session = session();

        // Log the logout action
        log_audit(
            'User logged out',
            'User with ID ' . $session->get('user_id') . ' logged out successfully.'
        );
        
        $session->destroy();
        
        return redirect()->to('/login');
    }

    public function processRegister()
    {
        $recaptchaSecret = getenv('RECAPTCHA_SECRET'); 
        $recaptchaResponse = $this->request->getPost('g-recaptcha-response');

        // Verify reCAPTCHA
        $verifyResponse = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$recaptchaSecret}&response={$recaptchaResponse}");
        $responseData = json_decode($verifyResponse);

        if (!$responseData->success) {
            return redirect()->to('/register')
                ->withInput()
                ->with('errors', ['recaptcha' => 'reCAPTCHA verification failed.']);
        }

        // todo: validate the firstname, lastname, course, gradelevel, and student id

        $validation = $this->validate([
            'firstName' => 'required|alpha_space|min_length[2]',
            'lastName'  => 'required|alpha_space|min_length[2]',
            'course'    => 'required',
            'gradeLevel' => 'required|integer',
            'studentId' => 'required|numeric|exact_length[7]|is_unique[users.data-user-student-id]', 
            'section'   => 'required',
            'email'    => 'required|valid_email|is_unique[users.data-user-email]',
            'password' => 'required|min_length[8]',
            'cpassword' => 'required|matches[password]',
        ]);

        if (!$validation) {
            return redirect()->to('/register')
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $otp = random_int(100000, 999999);

        $data = [
            'data-user-firstname' => $this->request->getPost('firstName'),
            'data-user-lastname'  => $this->request->getPost('lastName'),
            'data-user-course'    => $this->request->getPost('course'),
            'data-user-gradelevel' => $this->request->getPost('gradeLevel'),
            'data-user-student-id' => $this->request->getPost('studentId'), 
            'data-user-section'   => $this->request->getPost('section'),  
            'data-user-email'    => $this->request->getPost('email'),
            'data-user-password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'data-user-otp' => (string) $otp,
            'data-user-otp-expires' => date('Y-m-d H:i:s', strtotime('+15 minutes')),
        ];

        if ($this->userModel->save($data)) {
            $email = \Config\Services::email();
            $email->setTo($this->request->getPost('email'));
            $email->setSubject('Your OTP Code');
            $email->setMessage("Your OTP code is: $otp. It expires in 15 minutes.");
            $email->send();

            return redirect()->to('/otp')
                ->with('success', 'Registration Successful')
                ->with('email', $this->request->getPost('email'));
        } else {
            return redirect()->to('/register')->with('errors', $this->userModel->errors());
        }
    }

    public function otp()   
    {
        if(!session()->get('email')) {
            return redirect()->to('/login')->with('error', 'Please log in to access this page.');
        }

        if (session()->get('is_logged_in')) {
            return redirect()->to('/home');
        }

        return view('otp');
    }

    // todo: clean code

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

            session()->remove('email');

            return redirect()->to('/login')->with('success', 'Email verification successful. You can now log in.');
        } else {
            return redirect()->to('/otp')
                ->with('error', 'Invalid or expired OTP.')
                ->with('email', $email); // Keep email for retry
        }
    }
}