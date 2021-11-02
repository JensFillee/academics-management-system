<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

class BranchesController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        // Use templates/layout/admin.php as default layout of this controller
        $this->viewBuilder()->setLayout("admin");
    }

    public function addBranch()
    {

    }

    public function listBranches()
    {

    }

    public function editBranch($id = null)
    {

    }

    public function deleteBranch($id = null)
    {

    }
}
