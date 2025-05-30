<?php

namespace App\Models;

use CodeIgniter\Model;

class MemberModel extends Model
{
    protected $table = 'psits_members';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'member-lastname',
        'member-firstname',
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

    public function getMembersWithRoles()
    {
        // Initialize the query builder
        $builder = $this->builder();

        // Perform the join operation
        $builder->select('psits_members.*, users.data-user-role');  // Select all fields from psits_members and the user role
        $builder->join('users', 'psits_members.member-id-number = users.data-user-student-id');  // Adjust based on your table schema

        // Execute the query and return the result
        $query = $builder->get();
        return $query->getResultArray();  // Return results as an associative array
    }

}
