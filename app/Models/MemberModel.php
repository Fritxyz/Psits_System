<?php

namespace App\Models;

use CodeIgniter\Model;

class MemberModel extends Model
{
    protected $table = 'psits_members';
    protected $primaryKey = 'id';
    protected $allowedFields = ['member-lastname', 
                                'member-firstname',
                                'member-middlename',
                                'member-gmail',
                                'member-gender',
                                'member-age',
                                'member-course',
                                'member-section',
                                'member-gradelevel',
                                'member-contact',
                                'member-address',
                                'member-id-number',
                             ];

}
