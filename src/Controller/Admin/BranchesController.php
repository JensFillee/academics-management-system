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
        $this->set("title", "Add Branch | Academics Management");
    }

    public function listBranches()
    {
        $this->set("title", "List Branches | Academics Management");
    }

    public function editBranch($id = null)
    {
        $this->set("title", "Edit Branch | Academics Management");
    }

    public function deleteBranch($id = null)
    {

    }
}
