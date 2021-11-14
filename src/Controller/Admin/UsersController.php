<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

class UsersController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

        // user user.php-layout (= login-page)
        $this->viewBuilder()->setLayout("user");
        // load model
        $this->loadModel("Users");
    }

    // other actions
    public function login()
    {
        // login page

    }

    public function logout()
    {
        // logout page
    }
}
