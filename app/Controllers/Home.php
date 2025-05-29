<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\AnnouncementModel;

class Home extends BaseController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index(): string
    {
        return view('Home/psits-header', ['title' => 'Home']) 
            .view('Home/index');
    }

    public function achievements()
    {
        return view('Home/psits-header', ['title' => 'Achievements']) 
            .view('Home/achievements');
    }

    public function courses()
    {
        return view('Home/psits-header', ['title' => 'Courses']) 
            .view('Home/courses');
    }

    public function news()
    {
        return view('Home/psits-header', ['title' => 'News']) 
            .view('Home/news');
    }

    public function profile($userId)
    {
        // Check if user is logged in
        if (!session()->get('is_logged_in')) {
            return redirect()->to('/login')->with('error', 'You must be logged in to view this page.');
        }

        // Get user data
        $user = $this->userModel->find($userId);

        return view('Home/psits-header', ['title' => 'Profile']) 
            .view('Home/profile', ['user' => $user]);
    }

    public function editProfile($userId)
    {
        // Check if user is logged in
        if (!session()->get('is_logged_in')) {
            return redirect()->to('/login')->with('error', 'You must be logged in to edit your profile.');
        }

        // Get user data
        $user = $this->userModel->find($userId);

        return view('Home/psits-header', ['title' => 'Edit Profile']) 
            .view('Home/edit-profile', ['user' => $user]);
    }

    public function updateProfile($userId)
    {
        // Check if user is logged in
        if (!session()->get('is_logged_in')) {
            return redirect()->to('/login')->with('error', 'You must be logged in to update your profile.');
        }

        $validation = $this->validate([
            'firstName' => 'required|alpha_space|min_length[2]',
            'lastName'  => 'required|alpha_space|min_length[2]',
            'course'    => 'required',
            'gradeLevel' => 'required|integer',
            'studentId' => 'required|numeric|exact_length[7]',
            'section'   => 'required',
            'email'    => 'required|valid_email|',
        ]);

        if (!$validation) {
            return redirect()->to('/profile/' . $userId . '/edit')
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        // Validate and update user data
        $data = [
            'data-user-firstname' => $this->request->getPost('firstName'),
            'data-user-lastname'  => $this->request->getPost('lastName'),
            'data-user-course'    => $this->request->getPost('course'),
            'data-user-gradelevel' => $this->request->getPost('gradeLevel'),
            'data-user-student-id' => $this->request->getPost('studentId'), 
            'data-user-section'   => $this->request->getPost('section'),  
            'data-user-email'    => $this->request->getPost('email'),
        ];

        $this->userModel->update($userId, $data);

        return redirect()->to('/profile/' . $userId)->with('success', 'Profile updated successfully.');
    }
}
