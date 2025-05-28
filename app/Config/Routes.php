<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Auth;
use App\Controllers\Home;
use App\Controllers\AdminDashboard;
use App\Controllers\Announcement;
use App\Controllers\Member;
use App\Controllers\Profile;
use App\Controllers\User;

/**
 * @var RouteCollection $routes
 */

// PSITS home page routes
$routes->get('/', [Home::class, 'index']);
$routes->get('/achievements', [Home::class, 'achievements']);
$routes->get('/courses', [Home::class, 'courses']);
$routes->get('/news', [Home::class, 'news']);

// Admin Routes (PSITS Members)
$routes->get('/psits-dashboard', [AdminDashboard::class, 'psitsDashboard']);

// User Routes
$routes->get('/home', [User::class, 'index']);

// Annoucement Routes
$routes->get('/announcement', [Announcement::class, 'announcement']);
$routes->post('/add-announcement', [Announcement::class, 'addAnnouncement']); // remind me about this

// Auth Routes
$routes->get('/register', [Auth::class, 'register']);
$routes->post('/process_register', [Auth::class, 'processRegister']);
$routes->get('/login', [Auth::class, 'login']);
$routes->post('/processLogin', [Auth::class, 'processLogin']); 
$routes->get('/logout', [Auth::class, 'logout']);
$routes->get('/otp', [Auth::class, 'otp']);
$routes->post('/verifyOtp', [Auth::class, 'verifyOtp']); 

// Member Routes (PSITS Members)
$routes->get('/psits-members', [Member::class, 'psitsMembers']);
$routes->get('/delete/(:any)', [Member::class, 'deleteMember/$1']);
$routes->get('/addMember', [Member::class, 'addMember']);
$routes->post('/adding', [Member::class, 'addingMember']);
$routes->get('/updateMember/(:any)', [Member::class, 'updateMember/$1']);
$routes->post('/updating', [Member::class, 'updating']);
$routes->get('/approve/(:num)', [Member::class, 'approveMember/$1']);
$routes->get('/pendingMember', [Member::class, 'pendingMember']);
$routes->get('/membership', [Member::class, 'membership']);

/*Pending model*/
$routes->post('/processMembership', [Member::class, 'processMembership']);

// profile routes
$routes->get('/profile', [Profile::class, 'index']);