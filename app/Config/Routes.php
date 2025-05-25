<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Auth;
use App\Controllers\Home;
use App\Controllers\AdminDashboard;

/**
 * @var RouteCollection $routes
 */

// Admin Routes (PSITS Members)
$routes->get('/', [Home::class, 'index']);
$routes->get('/psits-dashboard', [AdminDashboard::class, 'psitsDashboard']);
$routes->get('/announcement', [AdminDashboard::class, 'announcement']);
$routes->post('/add-announcement', [AdminDashboard::class, 'addAnnouncement']); // remind me about this

// Auth Routes
$routes->get('/register', 'Home::register');
// $routes->post('/process_register', 'Home::processRegister');
$routes->get('/login', [Auth::class, 'login']);
$routes->post('/process-login', [Auth::class, 'processLogin']); // remind me about this
$routes->get('/logout', [Auth::class, 'logout']);
$routes->get('/otp', [Auth::class, 'otp']);
$routes->post('/verify-otp', [Auth::class, 'verifyOtp']); // remind me about this


/*Member model*/
$routes->get('/psits-members', 'Member::psitsMembers');
$routes->get('/delete/(:any)', 'Member::delete/$1');
$routes->get('/addMember', 'Member::AddMember');
$routes->post('/adding', 'Member::adding');
$routes->get('/updateMember/(:any)', 'Member::updateMember/$1');
$routes->post('/updating', 'Member::updating');

$routes->get('approve/(:num)', 'Member::approveUser/$1');
$routes->get('/pendingMember', 'Member::pendingMember');
$routes->get('/membership', 'Member::membership');

/*Pending model*/
$routes->post('/processMembership', 'Pending::ProcessMembership');

// TODO: fix /membership