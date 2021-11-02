<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

class CollegesController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        // Use templates/layout/admin.php as default layout of this controller
        $this->viewBuilder()->setLayout("admin");
    }

    public function addCollege()
    {

    }

    public function listColleges()
    {

    }

    public function editCollege($id = null)
    {

    }

    public function deleteCollege($id = null)
    {

    }
}
