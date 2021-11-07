<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

class DashboardsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        // Use templates/layout/admin.php as default layout of this controller
        $this->viewBuilder()->setLayout("admin");
    }

    public function index() {
        $this->set("title", "Admin Dashboard | Academics Management");
    }
}
