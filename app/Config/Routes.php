<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Auth;
use App\Controllers\Home;
use App\Controllers\AdminDashboard;
use App\Controllers\Announcement;
use App\Controllers\Audit;
use App\Controllers\Member;
use App\Controllers\Pending;
use App\Controllers\User;

/**
 * @var RouteCollection $routes
 */

// PSITS home page routes
$routes->get('/', [Home::class, 'index']);
$routes->get('/achievements', [Home::class, 'achievements']);
$routes->get('/courses', [Home::class, 'courses']);
$routes->get('/news', [Home::class, 'news']);

// PSITS home page routes (only for logged-in users)
$routes->get('/profile/(:num)', [Home::class, 'profile']);
$routes->get('/profile/(:num)/edit', [Home::class, 'editProfile']);
$routes->post('/profile/(:num)/edit/update', [Home::class, 'updateProfile']);
$routes->get('/annoucements', [Home::class, 'announcements']);
$routes->get('/change-password/(:num)', [Home::class, 'changePassword']);
$routes->post('/change-password/(:num)/update', [Home::class, 'updatePassword']);

// Admin Routes (PSITS Members)
$routes->get('/admin/psits/dashboard', [AdminDashboard::class, 'psitsDashboard']);

// Annoucement Routes
$routes->get('/admin/psits/announcements', [Announcement::class, 'announcement']);
$routes->post('/admin/psits/announcements/add', [Announcement::class, 'addAnnouncement']);
$routes->get('/admin/psits/announcements/pending', [Announcement::class, 'pendingAnnouncements']);
$routes->post('/admin/psits/announcements/pending/(:num)/reject', [Announcement::class, 'rejectAnnouncement/$1']);
$routes->post('/admin/psits/announcements/pending/(:num)/approve', [Announcement::class, 'approveAnnouncement/$1']);

// change password route
$routes->get('/admin/psits/change-password', [User::class, 'changePassword']);
$routes->post('/admin/psits/change-password/update', [User::class, 'updatePassword']);

// Auth Routes
$routes->get('/register', [Auth::class, 'register']);
$routes->post('/process_register', [Auth::class, 'processRegister']);
$routes->get('/login', [Auth::class, 'login']);
$routes->post('/processLogin', [Auth::class, 'processLogin']); 
$routes->post('/logout', [Auth::class, 'logout']);
$routes->get('/otp', [Auth::class, 'otp']);
$routes->post('/verifyOtp', [Auth::class, 'verifyOtp']); 

// Audit Routes
$routes->get('/admin/psits/audit', [Audit::class, 'index']);

// Member Routes (PSITS Members) - Super Admin and Admin
$routes->get('/admin/psits/members', [Member::class, 'psitsMembers']);
$routes->post('/admin/psits/members/delete/(:any)', [Member::class, 'deleteMember/$1']);
$routes->get('/admin/psits/members/add', [Member::class, 'addMember']);
$routes->post('/admin/psits/members/adding-member', [Member::class, 'addingMember']);
$routes->get('/admin/psits/members/(:any)', [Member::class, 'updateMember/$1']);
$routes->post('/admin/psits/members/(:any)/update', [Member::class, 'updatingMember/$1']);
$routes->post('/admin/psits/pending-members/approve/(:num)', [Member::class, 'approveMember/$1']);
$routes->get('/admin/psits/pending-members', [Member::class, 'pendingMember']);
$routes->get('/apply-membership', [Member::class, 'membership']);
$routes->post('/admin/psits/pending-members/reject/(:num)', [Member::class, 'rejectMember/$1']);

// Profile Routes
$routes->get('/admin/psits/profile', [User::class, 'index']);
$routes->post('/admin/psits/profile/update', [User::class, 'updateProfile']);

/*Pending model*/
$routes->post('/process-membership', [Pending::class, 'processMembership']);