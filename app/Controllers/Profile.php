<?php

namespace App\Controllers;

class Profile extends BaseController
{
    // logic is that pag i-render ang profile
    // i check kung may session (depende sa role  ng user)
    // kung wala, i-redirect sa login page
    public function index()
    {
        helper(['form']);

        // Load the profile view
        return view('profile');
    }
}