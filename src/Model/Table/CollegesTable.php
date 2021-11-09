<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class CollegesTable extends Table
{
    public function initialize(array $config): void
    {
        // tbl_colleges
        // set/give our table name (= tbl_colleges) (by default: it looks for a table named "colleges" -> not found)
        $this->setTable("tbl_colleges");
    }
}
