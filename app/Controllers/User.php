<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index()
    {
        if(!session()->get('is_logged_in')) {
            // If the user is not logged in, redirect to the login page
            return redirect()->to('/login');
        }
            
        // This method can be used to display user-related information or redirect to a specific view.
        return view('home_page');
    }
}