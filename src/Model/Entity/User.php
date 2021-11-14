<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class User extends Entity
{
    // in $_accessible: define all columns that need to be inserted into table
    protected $_accessible = [
        "id" => true,
        "name" => true,
        "email" => true,
        "phone_no" => true,
        "password" => true,
        "status" => true,
        "created_at" => true
    ];
}
