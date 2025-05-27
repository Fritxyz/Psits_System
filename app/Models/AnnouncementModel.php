<?php namespace App\Models;

use CodeIgniter\Model;

class AnnouncementModel extends Model
{
    protected $table      = 'announcements';
    protected $primaryKey = 'id';

    protected $allowedFields = ['title', 'who', 'what', 'when', 'where', 'content', 'status'];
    protected $useTimestamps = true;

    public function countApprovedAnnouncements()
    {
        return $this->where('status', 'APPROVED')->countAllResults();
    }

    // // Fetch pending announcements
    // public function getPendingAnnouncements()
    // {
    //     return $this->where('status', 'PENDING')->findAll();
    // }

    // // Add a new announcement
    // public function addAnnouncement($data)
    // {
    //     return $this->insert($data);
    // }

    // // Approve an announcement
    // public function approveAnnouncement($id)
    // {
    //     return $this->update($id, ['status' => 'APPROVED']);
    // }

    // // Reject an announcement
    // public function rejectAnnouncement($id)
    // {
    //     return $this->update($id, ['status' => 'REJECTED']);
    // }
}
