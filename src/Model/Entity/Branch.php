<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Branch extends Entity
{
    // in $_accessible: define all columns that need to be inserted into table
    // make all attributes of table "must assign" (because we have input fields for all columns in our add_branch.php-form)
    // used by patchEntity()-method
    protected $_accessible = [
        "name" => true,
        "description" => true,
        "college_id" => true,
        "start_date" => true,
        "end_date" => true,
        "total_seats" => true,
        "total_duration" => true,
        "status" => true,
        "created_at" => true,
    ];
}
