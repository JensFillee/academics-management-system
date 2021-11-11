<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class BranchesTable extends Table
{
    public function initialize(array $config): void
    {
        // tbl_branches
        // set/give our table name (by default: it looks for a table named "branches" -> not found)
        $this->setTable("tbl_branches");
    }
}
