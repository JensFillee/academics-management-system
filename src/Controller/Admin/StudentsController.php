<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

class StudentsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        // Use templates/layout/admin.php as default layout of this controller
        $this->viewBuilder()->setLayout("admin");

        $this->loadModel("Students");
        $this->loadModel("Colleges");
        $this->loadModel("Branches");
    }

    public function addStudent()
    {
        $student = $this->Students->newEmptyEntity();

        if ($this->request->is("post")) {
            $fileObject = $this->request->getData("profile_image");
            $filename = $fileObject->getClientFilename();
            $fileExtension = $fileObject->getClientMediaType();

            $valid_extension = array("image/png", "image/jpg", "image/jpeg", "image/gif");

            if (in_array($fileExtension, $valid_extension)) {
                $destination = WWW_ROOT . "students" . DS . $filename;
                $fileObject->moveTo($destination);

                $studentData = $this->request->getData();
                $studentData["profile_image"] = WWW_ROOT . "students" . DS . $filename;

                $student = $this->Students->patchEntity($student, $studentData);

                if ($this->Students->save($student)) {
                    $this->Flash->success("Student has been created successfully");
                } else {
                    $this->Flash->error("Failed to create student");
                }

                return $this->redirect(["action" => "listStudents"]);
            } else {
                $this->Flash->error("Uploaded file is not an image");
            }
        }

        $this->set(compact("student"));

        $this->set("title", "Add Student | Academics Management");
    }

    public function listStudents()
    {
        // We only want certain columns of associated tables
        $students = $this->Students->find()->contain([
            "studentCollege" => function ($q) {
                return $q->select(["id", "name"]);
            },
            "studentBranch" => function ($q) {
                return $q->select(["id", "name"]);
            },
        ])->toList();

        // Get colleges to show in Allot college dropdown
        $colleges = $this->Colleges->find()->select(["id", "name"])->toList();

        $this->set(compact("students", "colleges"));

        $this->set("title", "List Students | Academics Management");
    }

    public function editStudent($id = null)
    {
        $this->set("title", "Edit Student | Academics Management");
    }

    public function deleteStudent($id = null)
    {
    }

    public function getCollegeBranches()
    {
        // We don't need to render any layout (no view)
        $this->autoRender = false;

        // Get college_id, submitted from AJAX-request
        $college_id = $this->request->getQuery("college_id");

        // Get all branches from this college (where branch->college_id = $college_id)
        $branches = $this->Branches->find()->select(["id", "name"])->where([
            "college_id" => $college_id
        ])->toList();

        // Return JSON-object with the branches (+ status & message)
        // Check posted content via F12 -> Network -> allot-college?college_id=x -> Preview
        echo json_encode(array(
            "status" => 1,
            "message" => "Branches found",
            "branches" => $branches
        ));
    }

    public function assignCollegeBranch()
    {
        if ($this->request->is("post")) {
            // Get student-id from hidden input field
            $student_id = $this->request->getData("student_id");

            // Get student with this id (without associations)
            $student = $this->Students->get($student_id, [
                "contain" => []
            ]);

            // Get rest of the data (college_id & branch_id)
            $studentData = $this->request->getData();

            // Fill student with this data
            $student = $this->Students->patchEntity($student, $studentData);

            // Save $student
            if($this->Students->save($student)) {
                $this->Flash->success("College and branch assigned successfully to student");
            } else {
                $this->Flash->error("Failed to assign college/branch to student");
            }

            // Redirect to list
            return $this->redirect(["action" => "listStudents"]);
        }
    }
}
