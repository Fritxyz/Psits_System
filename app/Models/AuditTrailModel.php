<?php 

namespace App\Models;

use CodeIgniter\Model;

class AuditTrailModel extends Model
{
    protected $table = 'audit_trail';
    protected $allowedFields = ['user_id', 'action', 'details', 'ip_address'];
}
