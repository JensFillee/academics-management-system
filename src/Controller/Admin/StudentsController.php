<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

class StudentsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        // Use templates/layout/admin.php as default layout of this controller
        $this->viewBuilder()->setLayout("admin");
    }

    public function addStudent()
    {

    }

    public function listStudents()
    {

    }

    public function editStudent($id = null)
    {

    }

    public function deleteStudent($id = null)
    {

    }
}
