<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class UsersTable extends Table
{
    public function initialize(array $config): void
    {
        // tbl_users
        $this->setTable("tbl_users");
    }
}
