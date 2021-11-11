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
        if($this->request->is("post")) {
            // Get all values from form-inputs
            $branchData = $this->request->getData();

            // Fill $branch with the submitted values
            $branch = $this->Branches->patchEntity($branch, $branchData);

            // Save $branch
            if($this->Branches->save($branch)) {
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
        $branches = $this->Branches->find()->toList();
        $this->set(compact("branches"));

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
