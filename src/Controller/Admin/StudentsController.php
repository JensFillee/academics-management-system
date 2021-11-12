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

        $this->loadModel("Students");
    }

    public function addStudent()
    {
        $student = $this->Students->newEmptyEntity();

        $this->set(compact("student"));

        $this->set("title", "Add Student | Academics Management");
    }

    public function listStudents()
    {
        $this->set("title", "List Students | Academics Management");
    }

    public function editStudent($id = null)
    {
        $this->set("title", "Edit Student | Academics Management");
    }

    public function deleteStudent($id = null)
    {

    }
}
