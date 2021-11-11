<?php

/**
 * Routes configuration.
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * It's loaded within the context of `Application::routes()` method which
 * receives a `RouteBuilder` instance `$routes` as method argument.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

/*
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 */

/** @var \Cake\Routing\RouteBuilder $routes */
$routes->setRouteClass(DashedRoute::class);

/* Application Routes */
Router::prefix("admin", function (RouteBuilder $route) {
    // homepage: index() of DashboardsController
    $route->connect("/", ["controller" => "Dashboards", "action" => "index"]);

    // college routes
    $route->connect("/add-college", ["controller" => "Colleges", "action" => "addCollege"]);
    $route->connect("/list-colleges", ["controller" => "Colleges", "action" => "listColleges"]);
    $route->connect("/edit-college/:id", ["controller" => "Colleges", "action" => "editCollege"], ["pass" => array("id")]); // because "id" is used as a password in the URL
    $route->connect("/delete-college/:id", ["controller" => "Colleges", "action" => "deleteCollege"], ["pass" => array("id")]);

    // branch routes
    $route->connect("/add-branch", ["controller" => "Branches", "action" => "addBranch"]);
    $route->connect("/list-branches", ["controller" => "Branches", "action" => "listBranches"]);
    $route->connect("/edit-branch/:id", ["controller" => "Branches", "action" => "editBranch"], ["pass" => array("id")]);
    $route->connect("/delete-branch/:id", ["controller" => "Branches", "action" => "deleteBranch"], ["pass" => array("id")]);

    // student routes
    $route->connect("/add-student", ["controller" => "Students", "action" => "addStudent"]);
    $route->connect("/list-students", ["controller" => "Students", "action" => "listStudents"]);
    $route->connect("/edit-student/:id", ["controller" => "Students", "action" => "editStudent"], ["pass" => array("id")]);
    $route->connect("/delete-student/:id", ["controller" => "Students", "action" => "deleteStudent"], ["pass" => array("id")]);

    // staff routes
    $route->connect("/add-staff", ["controller" => "Staffs", "action" => "addStaff"]);
    $route->connect("/list-staff", ["controller" => "Staffs", "action" => "listStaff"]);
    $route->connect("/edit-staff/:id", ["controller" => "Staffs", "action" => "editStaff"], ["pass" => array("id")]);
    $route->connect("/delete-staff/:id", ["controller" => "Staffs", "action" => "deleteStaff"], ["pass" => array("id")]);

    // reports routes
    $route->connect("/colleges-report", ["controller" => "Reports", "action" => "collegesReport"]);
    $route->connect("/students-report", ["controller" => "Reports", "action" => "studentsReport"]);
    $route->connect("/staff-report", ["controller" => "Reports", "action" => "staffsReport"]);
});

$routes->scope('/', function (RouteBuilder $builder) {
    /*
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, templates/Pages/home.php)...
     */
    $builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);

    /*
     * ...and connect the rest of 'Pages' controller's URLs.
     */
    $builder->connect('/pages/*', 'Pages::display');

    /*
     * Connect catchall routes for all controllers.
     *
     * The `fallbacks` method is a shortcut for
     *
     * ```
     * $builder->connect('/:controller', ['action' => 'index']);
     * $builder->connect('/:controller/:action/*', []);
     * ```
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    $builder->fallbacks();
});

/*
 * If you need a different set of middleware or none at all,
 * open new scope and define routes there.
 *
 * ```
 * $routes->scope('/api', function (RouteBuilder $builder) {
 *     // No $builder->applyMiddleware() here.
 *
 *     // Parse specified extensions from URLs
 *     // $builder->setExtensions(['json', 'xml']);
 *
 *     // Connect API actions here.
 * });
 * ```
 */
