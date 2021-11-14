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

        // Load models
        $this->loadModel("Colleges");
        $this->loadModel("Students");
        $this->loadModel("Staffs");
    }

    public function index()
    {
        // Get userdata
        // $userdata = $this->Auth->user();
        // echo "<pre/>";
        // print_r($userdata);
        // result:
        /*
        <pre/>Array
        (
            [id] => 1
            [name] => Jens Fillée
            [email] => jens.fillee@admin.com
            [phone_no] => 0454129817
            [status] => 1
            [created_at] => Cake\I18n\FrozenTime Object
                (
                    [date] => 2021-10-16 14:55:55.000000
                    [timezone_type] => 3
                    [timezone] => UTC
                )

        )
        */

        // Colleges Count
        $collegeQuery = $this->Colleges->find();

        $collegesData = $collegeQuery->select([
            "total_data" => $collegeQuery->func()->count("*") /* make a new attribute with value = count of all college-records */
        ])->first();

        $collegesCount = $collegesData->total_data; /* $collegesCount = the value of total_data */

        // Students Count
        $studentQuery = $this->Students->find();

        $studentsData = $studentQuery->select([
            "total_data" => $studentQuery->func()->count("*")
        ])->first();

        $studentsCount = $studentsData->total_data;

        // Staff Count
        $staffQuery = $this->Staffs->find();

        $staffData = $staffQuery->select([
            "total_data" => $staffQuery->func()->count("*")
        ])->first();

        $staffCount = $staffData->total_data;

        // Use variables in view
        $this->set(compact("collegesCount", "studentsCount", "staffCount"));

        $this->set("title", "Admin Dashboard | Academics Management");
    }
}
