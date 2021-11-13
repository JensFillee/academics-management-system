<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Staff extends Entity
{
    // in $_accessible: define all columns that need to be inserted into table
    protected $_accessible = [
        "id" => true,
        "name" => true,
        "email" => true,
        "phone_no" => true,
        "designation" => true,
        "staff_type" => true,
        "college_id" => true,
        "branch_id" => true,
        "address" => true,
        "blood_group" => true,
        "gender" => true,
        "profile_image" => true,
        "dob" => true,
        "status" => true,
        "created_at" => true
    ];
}
