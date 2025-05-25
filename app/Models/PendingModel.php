<?php

namespace App\Models;

use CodeIgniter\Model;

class PendingModel extends Model
{
    protected $table = 'pending_members';
    protected $primaryKey = 'id';
    protected $allowedFields = ['pending_username',
                                'pending_password',
                                'pending_lastname', 
                                'pending_firstname',
                                'pending_middlename',
                                'pending_Idnumber',
                                'pending_age',
                                'pending_gender',
                                'pending_contact',
                                'pending_address',
                                'pending_course',
                                'pending_section',
                                'pending_gradelevel',
                                'pending_gmail',
                            ];
                            
}
