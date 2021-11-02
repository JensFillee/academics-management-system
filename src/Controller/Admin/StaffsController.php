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

    }

    public function listStaffs()
    {

    }

    public function editStaff($id = null)
    {

    }

    public function deleteStaff($id = null)
    {

    }
}
