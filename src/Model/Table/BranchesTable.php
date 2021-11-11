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

        // association with college (a branch belongs to a college)
        // "branch_college" = key used to identify this association (used in BranchesController listBranches())
        //
        $this->belongsTo("branch_college", [
            "className" => "Colleges"
        ])->setForeignKey("college_id");
    }
}
