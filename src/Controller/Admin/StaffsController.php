<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

class StaffsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        // Use templates/layout/admin.php as default layout of this controller
        $this->viewBuilder()->setLayout("admin");
    }

    public function addStaff()
    {
        $this->set("title", "Add Staff | Academics Management");
    }

    public function listStaff()
    {
        $this->set("title", "List Staff | Academics Management");
    }

    public function editStaff($id = null)
    {
        $this->set("title", "Edit Staff | Academics Management");
    }

    public function deleteStaff($id = null)
    {

    }
}
