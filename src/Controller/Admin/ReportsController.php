<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

class ReportsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        // Use templates/layout/admin.php as default layout of this controller
        $this->viewBuilder()->setLayout("admin");

        $this->loadModel("Colleges");
        $this->loadModel("Students");
    }

    public function collegesReport()
    {
        $colleges = $this->Colleges->find()->toList();

        $this->set(compact("colleges"));

        $this->set("title", "Colleges Report | Academics Management");
    }

    public function studentsReport()
    {
        // We only want certain columns of associated tables
        $students = $this->Students->find()->contain([
            "studentCollege" => function ($q) {
                return $q->select(["id", "name"]);
            },
            "studentBranch" => function ($q) {
                return $q->select(["id", "name"]);
            },
        ])->toList();

        $this->set(compact("students"));

        $this->set("title", "Students Report | Academics Management");
    }

    public function staffsReport()
    {
        $this->set("title", "Staff Report | Academics Management");
    }
}
