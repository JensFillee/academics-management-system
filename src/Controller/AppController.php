<?php

declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\EventInterface;
use Cake\Routing\Router;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/4/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    public function initialize(): void
    {
        // Also possible: define layout here --> used for all controllers (they extend AppController)
        // $this->viewBuilder()->setLayout("admin");

        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        // Load auth component (in AppController -> everything is protected (every other controller extends AppController))
        $this->loadComponent('Auth', [
            "authenticate" => [
                "Form" => [ /* Login-form */
                    "fields" => [
                        "username" => "email",  /* use email attribute (of Users) as username */
                        "password" => "password" /* use password attribute (of Users) as password */
                    ],
                    "userModel" => "Users" /* model to use for authentication */
                ]
            ], [
                "loginAction" => [ /* where is login-page located: /admin/users/login */
                    "controller" => "Users",
                    "action" => "login",
                    "prefix" => "Admin"
                ],
                /* will be ignored if the user has an Auth.redirect value in their session */
                /* The AuthComponent remembers what controller/action pair you were trying to get to before you were asked to authenticate yourself by storing this value in the Session, under the Auth.redirect key */
                /* solution: see beforeFilter (DOESN'T WORK) */
                /* solution that does work: return $this->redirect($this->referer()) (see UsersController) */
                "logoutRedirect" => [ /* where to go after pressing logout button: /admin/users/login */
                    "controller" => "Users",
                    "action" => "login", /* go to login-page */
                    "prefix" => "Admin"
                ]
            ]
        ]);

        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');
    }

    function beforeRender(EventInterface $event)
    {
        // Make $this->Auth->user() accessible in all views though $Auth variable
        $this->set("Auth", $this->Auth->user());
    }

    public function beforeFilter(EventInterface $event)
    {
        // $this->Auth->loginRedirect = array('action' => 'index', 'controller' => 'Dashboards');

        // Only use Auth.redirect if you're not on login-page
        // $url = Router::url(NULL, true); //complete url
        // if ($url != 'http://academics_management_system.test/admin/users/login') {
        //     $this->Session->write('Auth.redirect', $url);
        // }
        // echo "</pre>";
        // print_r($url);
    }
}
