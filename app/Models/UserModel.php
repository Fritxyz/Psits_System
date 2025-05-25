<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'data-user-id';
    protected $allowedFields = ['data-user-email', 'data-user-password', 'data-user-cpassword', 'data-user-otp', 'data-user-otp-expires', 'data-user-is-verified'];
    
}
