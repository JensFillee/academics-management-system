<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Log\Engine\ConsoleLog;

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
        // Get id of current user
        $user_id = $this->Auth->user("id");

        // Check if user is already logged in (otherwise logged in user can log in again)
        if (!empty($user_id)) {
            // redirect to admin-homepage
            $this->redirect("/admin");
        } else {
            // login page
            // login function is used to show form + also to submit it (action of the form = this method)
            // check if form submitted
            if ($this->request->is("post")) {
                // check if email + password match a user is Users table -> if it finds a user: get it with all it's data
                $userdata = $this->Auth->identify();
                // if a user is found
                if ($userdata) {
                    // make userdata available through $this->Auth->user() (using it: see AppController + left-sidebar)
                    $this->Auth->setUser($userdata);

                    // redirect to loginRedirect-route (specified in AppController)
                    // $this->Auth->redirectUrl() returns "/" for some reason?
                    return $this->redirect($this->Auth->redirectUrl());
                } else {
                    $this->Flash->error("Invalid login details");
                }
            }
        }

        // Set title-variable (used in login.php)
        $this->set("title", "Log in | Academics Management");
    }

    public function logout()
    {
        $this->Flash->success("Logged out successfully");

        // logout user (destroy values stored in this user's session) + redirect to logoutRedirect
        return $this->redirect($this->Auth->logout());
    }
}
