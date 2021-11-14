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
        // login function is used to show form + also to submit it (action of the form = this method)
        // check if form submitted
        if($this->request->is("post") ) {
            // check if email + password match a user is Users table -> if it finds a user: get it
            $userdata = $this->Auth->identify();
            // if a user is found
            if($userdata) {
                // make userdata useable in view
                $this->Auth->setUser($userdata);

                // redirect to loginRedirect-route (specified in AppController)
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error("Invalid login details");
            }
        }
    }

    public function logout()
    {
        // logout page
    }
}
