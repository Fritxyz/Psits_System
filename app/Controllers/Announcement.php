<?php

namespace App\Controllers;

use App\Models\AnnouncementModel;

class Announcement extends BaseController
{
    private $announcementModel;
    
    public function __construct()
    {
        $this->announcementModel = new AnnouncementModel();
    }

    public function announcement()
    {
        // $announcementModel = new AnnouncementModel();

        // // Fetch pending announcements from the model
        // $getPendingAnnouncements = $announcementModel->getPendingAnnouncements();

        // // Pass the announcements to the view
        // return view('announcement', ['getPendingAnnouncements' => $getPendingAnnouncements]);

        if(!session()->get('is_logged_in')) {
            return redirect()->to('/login')->with('error', 'Please log in to access this page.');
        }

        if(session()->get('user_role') !== 'Super Admin' && session()->get('user_role') !== 'Admin') {
            return redirect()->to('/')->with('error', 'You do not have permission to access this page.');
        }

        $data['announcements'] = $this->announcementModel->findAll();
        return view('announcement', $data);
    }

    public function addAnnouncement()
    {
        helper('audit');

        $data = [
            'title' => $this->request->getPost('title'),
            'who' => $this->request->getPost('who'),
            'what' => $this->request->getPost('what'),
            'when' => $this->request->getPost('when'),
            'where' => $this->request->getPost('where'),
            'content' => $this->request->getPost('content'),
            'status' => 'PENDING', // Default status
        ];

        log_audit(
            'Admin added an announcement',
            'User with ID ' . session()->get('user_id') . ' added a new announcement with title: ' . $data['title'],
        );

        if ($this->announcementModel->insert($data)) {
            return redirect()->to('/admin/psits/announcements')->with('success', 'Announcement added successfully.');
        } 
            
        return redirect()->to('/admin/psits/announcements')->with('error', 'Failed to add announcement.');
    }

    public function pendingAnnouncements()
    {
        if(!session()->get('is_logged_in')) {
            return redirect()->to('/login')->with('error', 'Please log in to access this page.');
        }

        if(session()->get('user_role') !== 'Super Admin' && session()->get('user_role') !== 'Admin') {
            return redirect()->to('/')->with('error', 'You do not have permission to access this page.');
        }

        $data['pendingAnnouncements'] = $this->announcementModel->where('status', 'PENDING')->findAll();


        return view('pending-announcements', $data);
    }

    public function rejectAnnouncement($id)
    {
        helper('audit');

        if(!session()->get('is_logged_in')) {
            return redirect()->to('/login')->with('error', 'Please log in to access this page.');
        }

        if(session()->get('user_role') !== 'Super Admin' && session()->get('user_role') !== 'Admin') {
            return redirect()->to('/')->with('error', 'You do not have permission to access this page.');
        }

        $this->announcementModel->update($id, ['status' => 'REJECTED']);
        
        log_audit(
            'Admin rejected an announcement',
            'User with ID ' . session()->get('user_id') . ' rejected the announcement with ID: ' . $id,
        );

        return redirect()->to('/admin/psits/announcements/pending')->with('success', 'Announcement rejected successfully.');
    }

    public function approveAnnouncement($id)
    {
        helper('audit');

        if(!session()->get('is_logged_in')) {
            return redirect()->to('/login')->with('error', 'Please log in to access this page.');
        }

        if(session()->get('user_role') !== 'Super Admin' && session()->get('user_role') !== 'Admin') {
            return redirect()->to('/')->with('error', 'You do not have permission to access this page.');
        }

        $this->announcementModel->update($id, ['status' => 'APPROVED']);
        
        log_audit(
            'Admin approved an announcement',
            'User with ID ' . session()->get('user_id') . ' approved the announcement with ID: ' . $id,
        );

        return redirect()->to('/admin/psits/announcements/pending')->with('success', 'Announcement approved successfully.');
    }
}