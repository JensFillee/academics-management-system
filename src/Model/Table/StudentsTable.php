<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class StudentsTable extends Table
{
    public function initialize(array $config): void
    {
        // tbl_students
        $this->setTable("tbl_students");

        // college association
        $this->belongsTo("studentCollege", [
            "className" => "Colleges",
            "foreignKey" => "college_id"
        ]);

        // branch association
        $this->belongsTo("studentBranch", [
            "className" => "Branches",
            "foreignKey" => "branch_id"
        ]);
    }
}
