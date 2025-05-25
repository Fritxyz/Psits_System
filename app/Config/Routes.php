<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Auth;
use App\Controllers\Home;
use App\Controllers\AdminDashboard;
use App\Controllers\Announcement;
use App\Controllers\Member;

/**
 * @var RouteCollection $routes
 */

// Admin Routes (PSITS Members)
$routes->get('/', [Home::class, 'index']);
$routes->get('/psits-dashboard', [AdminDashboard::class, 'psitsDashboard']);

// Annoucement Routes
$routes->get('/announcement', [Announcement::class, 'announcement']);
$routes->post('/add-announcement', [Announcement::class, 'addAnnouncement']); // remind me about this

// Auth Routes
$routes->get('/register', 'Home::register');
// $routes->post('/process_register', 'Home::processRegister');
$routes->get('/login', [Auth::class, 'login']);
$routes->post('/process-login', [Auth::class, 'processLogin']); // remind me about this
$routes->get('/logout', [Auth::class, 'logout']);
$routes->get('/otp', [Auth::class, 'otp']);
$routes->post('/verify-otp', [Auth::class, 'verifyOtp']); // remind me about this

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
$routes->post('/processMembership', 'Pending::ProcessMembership');