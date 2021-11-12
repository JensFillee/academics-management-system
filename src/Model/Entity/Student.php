<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Student extends Entity
{
    // in $_accessible: define all columns that need to be inserted into table
    // used by patchEntity()-method
    protected $_accessible = [
        "id" => true,
        "name" => true,
        "email" => true,
        "phone_no" => true,
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
