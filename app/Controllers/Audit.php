<?php

namespace App\Controllers;


class Audit extends BaseController
{

    private $auditTrailModel;

    public function __construct()
    {
        // Load the AuditTrailModel to interact with audit data
        $this->auditTrailModel = model('App\Models\AuditTrailModel');
    }

    public function index()
    {
        // Check if the user is logged in
        if (!session()->get('is_logged_in')) {
            return redirect()->to('/login')->with('error', 'Please log in to access this page.');
        }

        // Check if the user has the required role to access this page
        if (session()->get('user_role') !== 'Super Admin' && session()->get('user_role') !== 'Admin') {
            return redirect()->to('/')->with('error', 'You do not have permission to access this page.');
        }

        $audits = $this->auditTrailModel->findAll();

        // Load the audit view
        return view('audit-trail', ['audits' => $audits]);
    }
}