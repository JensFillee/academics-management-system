<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

class StaffsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        // Use templates/layout/admin.php as default layout of this controller
        $this->viewBuilder()->setLayout("admin");

        $this->loadModel("Staffs");
    }

    public function addStaff()
    {
        $staff = $this->Staffs->newEmptyEntity();

        // if ($this->request->is("post")) {
        //     $fileObject = $this->request->getData("profile_image");
        //     $filename = $fileObject->getClientFilename();
        //     $fileExtension = $fileObject->getClientMediaType();

        //     $valid_extension = array("image/png", "image/jpg", "image/jpeg", "image/gif");

        //     if (in_array($fileExtension, $valid_extension)) {
        //         $destination = WWW_ROOT . "students" . DS . $filename;
        //         $fileObject->moveTo($destination);

        //         $studentData = $this->request->getData();
        //         $studentData["profile_image"] = WWW_ROOT . "students" . DS . $filename;

        //         $student = $this->Students->patchEntity($student, $studentData);

        //         if ($this->Students->save($student)) {
        //             $this->Flash->success("Student has been created successfully");
        //         } else {
        //             $this->Flash->error("Failed to create student");
        //         }

        //         return $this->redirect(["action" => "listStudents"]);
        //     } else {
        //         $this->Flash->error("Uploaded file is not an image");
        //     }
        // }

        $this->set(compact("staff"));

        $this->set("title", "Add Staff | Academics Management");
    }

    public function listStaff()
    {
        $this->set("title", "List Staff | Academics Management");
    }

    public function editStaff($id = null)
    {
        $this->set("title", "Edit Staff | Academics Management");
    }

    public function deleteStaff($id = null)
    {

    }
}
