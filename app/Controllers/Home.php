<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\AnnouncementModel;

class Home extends BaseController
{
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
}
