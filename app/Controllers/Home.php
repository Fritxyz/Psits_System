<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\AnnouncementModel;

class Home extends BaseController
{
    public function index(): string
    {
        return view('Home/index');
    }

    public function achievements()
    {
        return view('Home/achievements');
    }

    public function courses()
    {
        return view('Home/courses');
    }

    public function news()
    {
        return view('Home/news');
    }
}
