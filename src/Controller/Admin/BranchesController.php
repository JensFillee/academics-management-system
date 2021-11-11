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

        // Load models (Model/Table/CollegesTable.php & BranchesTable.php)
        $this->loadModel("Colleges");
        $this->loadModel("Branches");
    }

    public function addBranch()
    {
        // Create an empty Branch
        $branch = $this->Branches->newEmptyEntity();

        // If data is submitted
        if ($this->request->is("post")) {
            // Get all values from form-inputs
            $branchData = $this->request->getData();

            // Fill $branch with the submitted values
            $branch = $this->Branches->patchEntity($branch, $branchData);

            // Save $branch
            if ($this->Branches->save($branch)) {
                $this->Flash->success("Branch has been created successfully");
                // Redirect to list
                return $this->redirect(["action" => "listBranches"]);
            } else {
                $this->Flash->error("Failed to create branch");
            }
        }

        // Get list of colleges
        $colleges = $this->Colleges->find()->select(["id", "name"])->toList();

        // Make variables usable in view
        $this->set(compact("colleges", "branch"));

        $this->set("title", "Add Branch | Academics Management");
    }

    public function listBranches()
    {
        // Get list of branches + use in view
        $branches = $this->Branches->find()
            ->select([
                "id",
                "name",
                "college_id",
                "start_date",
                "end_date",
                "total_seats",
                "total_duration",
                "branch_college.name" // name of this branch's college (see BranchesTable.php)
            ])
            ->contain(["branch_college"])
            ->toList();

        // echo "<pre>";
        // print_r($branches);     returns:
        /*
        <pre>Array
        (
            [0] => App\Model\Entity\Branch Object
                (
                    [name] => Branch 1
                    [college_id] => 1
                    [start_date] => 16-06-2021
                    [end_date] => 19-07-2024
                    [total_seats] => 258
                    [total_duration] => 4
                    [branch_college] => App\Model\Entity\College Object
                        (
                            [name] => College 1
                            [[new]] =>
                            [[accessible]] => Array
                                (
                                    [name] => 1
                                    [short_name] => 1
                                    [description] => 1
                                    [location] => 1
                                    [total_faculty] => 1
                                    [contact_number] => 1
                                    [email] => 1
                                    [cover_image] => 1
                                    [status] => 1
                                )

        */

        $this->set(compact("branches"));

        $this->set("title", "List Branches | Academics Management");
    }

    public function editBranch($id = null)
    {
        // Get branch with id from URL
        // No association needed -> leave blank
        $branch = $this->Branches->get($id, [
            "contain" => []
        ]);

        // If data is submitted
        if ($this->request->is(["post", "put", "patch"])) {
            // Get all values from form-inputs
            $branchData = $this->request->getData();

            // Fill $branch with the submitted values
            $branch = $this->Branches->patchEntity($branch, $branchData);

            // Save $branch
            if ($this->Branches->save($branch)) {
                $this->Flash->success("Branch has been updated successfully");
                // Redirect to list
                return $this->redirect(["action" => "listBranches"]);
            } else {
                $this->Flash->error("Failed to update branch");
            }
        }

        // Get list of colleges
        $colleges = $this->Colleges->find()->select(["id", "name"])->toList();

        // Make variables usable in view
        $this->set(compact("colleges", "branch"));

        $this->set("title", "Edit Branch | Academics Management");
    }

    public function deleteBranch($id = null)
    {
    }
}
