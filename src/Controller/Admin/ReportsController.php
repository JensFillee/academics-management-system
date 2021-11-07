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
    }

    public function collegesReport()
    {
        $this->set("title", "Colleges Report | Academics Management");
    }

    public function studentsReport()
    {
        $this->set("title", "Students Report | Academics Management");
    }

    public function staffsReport()
    {
        $this->set("title", "Staff Report | Academics Management");
    }
}
