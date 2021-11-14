<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

class UsersController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

        // load model
        $this->loadModel("Users");
    }

    // other actions
    public function login()
    {
        /* don't use a view */
        $this->autoRender = false;
        echo "<h3>Login page</h3>";
    }

    public function dashboard()
    {
        /* don't use a view */
        $this->autoRender = false;
        echo "<h3>Dashboard page</h3>";
    }

    public function logout()
    {
    }
}
