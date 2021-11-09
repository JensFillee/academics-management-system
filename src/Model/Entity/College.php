<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class College extends Entity
{
    // in $_accessible: define all columns that need to be inserted into table
    // make all attributes of table "must assign" (because we have input fields for all columns in our add_college.php-form)
    protected $_accessible = [
        "name" => true,
        "short_name" => true,
        "description" => true,
        "location" => true,
        "total_faculty" => true,
        "contact_number" => true,
        "email" => true,
        "cover_image" => true,
        "status" => true
    ];
}
