<?php

namespace App\Controllers;


use App\Models\PendingModel;
use App\Models\MemberModel;

class AdminDashboard extends BaseController
{
    private $pendingModel;
    private $memberModel;

    public function __construct()
    {
        $this->pendingModel = new PendingModel();
        $this->memberModel = new MemberModel();
    }

    public function psitsDashboard()
    {
        $pendingdata['pendingCount'] = $this->pendingModel->countAllResults();

        // Fetch grade level data with count
        $gradeLevelData = $this->memberModel->select('member-gradelevel, COUNT(*) as total')
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
}