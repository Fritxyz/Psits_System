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
        
        $data['announcements'] = $this->announcementModel->findAll();
        return view('announcement', $data);
    }

    public function addAnnouncement()
    {
        $data = [
            'title' => $this->request->getPost('title'),
            'who' => $this->request->getPost('who'),
            'what' => $this->request->getPost('what'),
            'when' => $this->request->getPost('when'),
            'where' => $this->request->getPost('where'),
            'content' => $this->request->getPost('content'),
            'status' => 'PENDING', // Default status
        ];

        if ($this->announcementModel->insert($data)) {
            return redirect()->to('/announcement')->with('success', 'Announcement added successfully.');
        } 
            
        return redirect()->to('/announcement')->with('error', 'Failed to add announcement.');
    }
}