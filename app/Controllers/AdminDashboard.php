<?php

namespace App\Controllers;

use App\Models\AnnouncementModel;
use App\Models\PendingModel;
use App\Models\MemberModel;

class AdminDashboard extends BaseController
{
    public function psitsDashboard(): string
    {
        $memberModel = new MemberModel();
        $pendingUserModel = new PendingModel();
        $pendingdata['pendingCount'] = $pendingUserModel->countAllResults();

        // Fetch grade level data with count
        $gradeLevelData = $memberModel->select('member-gradelevel, COUNT(*) as total')
                            ->groupBy('member-gradelevel')
                            ->findAll();

        // Initialize variables
        $gradeLevels = [];
        $totals = [];
        $totalMembers = 0;
        $aboveFourthYearTotal = 0;

        foreach ($gradeLevelData as $row) {
            $yearLevel = (int)$row['member-gradelevel'];

            // Determine the category
            $formattedYearLevel = match ($yearLevel) {
                1 => '1st Year',
                2 => '2nd Year',
                3 => '3rd Year',
                4 => '4th Year',
                default => 'Above 4th Year',
            };

            if ($formattedYearLevel === 'Above 4th Year') {
                $aboveFourthYearTotal += $row['total'];
            } else {
                $gradeLevels[] = $formattedYearLevel;
                $totals[] = $row['total'];
            }

            $totalMembers += $row['total'];
        }

        // Add "Above 4th Year" category to the chart data if it has members
        if ($aboveFourthYearTotal > 0) {
            $gradeLevels[] = 'Above 4th Year';
            $totals[] = $aboveFourthYearTotal;
        }

        $data = [
            'gradeLevels' => json_encode($gradeLevels),
            'totals' => json_encode($totals),
            'totalMembers' => $totalMembers,
            
        ];

        return view('psits-dashboard', array_merge($data, $pendingdata));
    }

    public function announcement()
    {
        // $announcementModel = new AnnouncementModel();

        // // Fetch pending announcements from the model
        // $getPendingAnnouncements = $announcementModel->getPendingAnnouncements();

        // // Pass the announcements to the view
        // return view('announcement', ['getPendingAnnouncements' => $getPendingAnnouncements]);
        
        $announcementModel = new AnnouncementModel();
        $data['announcements'] = $announcementModel->findAll();
        return view('announcement', $data);
    }

    public function addAnnouncement()
    {
        $announcementModel = new AnnouncementModel();

        $data = [
            'title' => $this->request->getPost('title'),
            'who' => $this->request->getPost('who'),
            'what' => $this->request->getPost('what'),
            'when' => $this->request->getPost('when'),
            'where' => $this->request->getPost('where'),
            'content' => $this->request->getPost('content'),
            'status' => 'PENDING', // Default status
        ];

        if ($announcementModel->addAnnouncement($data)) {
            return redirect()->to('/announcement')->with('success', 'Announcement added successfully.');
        } else {
            return redirect()->to('/announcement')->with('error', 'Failed to add announcement.');
        }
    }
}