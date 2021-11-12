<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

class CollegesController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        // Load model (Model/Table/CollegesTable.php)
        $this->loadModel("Colleges");
        // Use templates/layout/admin.php as default layout of this controller
        $this->viewBuilder()->setLayout("admin");
    }

    public function addCollege()
    {
        // Create an empty College
        $college = $this->Colleges->newEmptyEntity();

        // If form is submitted
        // Collect data from form
        if ($this->request->is("post")) {
            // get value of input with id #cover_image
            $fileObject = $this->request->getData("cover_image");

            /*
            print_r($fileObject);die;    returns:

            Laminas\Diactoros\UploadedFile Object
            (
                [clientFilename:Laminas\Diactoros\UploadedFile:private] => 2021-10-07.png
                [clientMediaType:Laminas\Diactoros\UploadedFile:private] => image/png
                [error:Laminas\Diactoros\UploadedFile:private] => 0
                [file:Laminas\Diactoros\UploadedFile:private] => /tmp/phpJ1hwsK
                [moved:Laminas\Diactoros\UploadedFile:private] =>
                [size:Laminas\Diactoros\UploadedFile:private] => 794242
                [stream:Laminas\Diactoros\UploadedFile:private] =>
            )
            */
            // get filename & extension (see above)
            $filename = $fileObject->getClientFilename();
            $fileExtension = $fileObject->getClientMediaType();

            // check if file is an image (using the extension)
            $valid_extension = array("image/png", "image/jpg", "image/jpeg", "image/gif");
            if (in_array($fileExtension, $valid_extension)) {
                // create a destination foler
                //   WWW_ROOT = webroot-folder
                //   "colleges" = a new folder "colleges" we created manually in webroot
                //   DS = / (Directory Seperator)
                $destination = WWW_ROOT . "colleges" . DS . $filename;

                // move the file to $destination
                $fileObject->moveTo($destination);

                // get all values from form-inputs
                $collegeData = $this->request->getData();
                // set the cover_image attribute to the filepath to the image
                $collegeData['cover_image'] = "colleges" . DS . $filename;

                // fill (now still empty) $college with values of form-inputs
                $college = $this->Colleges->patchEntity($college, $collegeData);

                // save $college
                if ($this->Colleges->save($college)) {
                    // send success-message
                    $this->Flash->success("College has been created successfully");

                    // redirect to listColleges-page (see listColleges() method)
                    return $this->redirect(["action" => "listColleges"]);
                } else {
                    $this->Flash->error("Failed to create college");
                }
            } else {
                $this->Flash->error("Uploaded file is not an image");
            }

            // showing Flash messages: see templates/layout/admin.php
        }

        // Create a 'college' variable to use in view
        $this->set(compact("college"));

        $this->set("title", "Add College | Academics Management");
    }

    public function listColleges()
    {
        // Get all colleges
        $colleges = $this->Colleges->find()->toList();

        // Create a 'colleges' variable to use in view
        $this->set(compact("colleges"));

        $this->set("title", "List Colleges | Academics Management");
    }

    public function editCollege($id = null)
    {
        $college = $this->Colleges->get($id, [
            "contain" => [] /* right now: no assossiation with this table -> blank (?) */
        ]);

        // Collect data from form (some users use post or patch (?))
        if ($this->request->is(["post", "put", "patch"])) {
            // get all values from form-inputs
            $collegeData = $this->request->getData();

            // get value of input with id #cover_image
            $fileObject = $this->request->getData("cover_image");
            // get filename & extension
            $filename = $fileObject->getClientFilename();
            $fileExtenstion = $fileObject->getClientMediaType();

            // If user uploaded a new image file from edit-page
            if (!empty($filename)) {
                // check if new file is an image (using the extension)
                $valid_extension = array("image/png", "image/jpg", "image/jpeg", "image/gif");
                if (in_array($fileExtenstion, $valid_extension)) {
                    // create a destination foler
                    //   WWW_ROOT = webroot-folder
                    //   "colleges" = a new folder "colleges" we created manually in webroot
                    //   DS = / (Directory Seperator)
                    $destination = WWW_ROOT . "colleges" . DS . $filename;

                    // move the file to $destination
                    $fileObject->moveTo($destination);

                    // set the cover_image attribute to the filepath to the NEW image
                    $collegeData['cover_image'] = "colleges" . DS . $filename;
                } else {
                    $this->Flash->error("Uploaded file is not an image");
                }
            }
            // No new image uploaded
            else {
                // set the cover_image attribute to the filepath to the OLD image
                $collegeData['cover_image'] = $college->cover_image;
            }

            // fill $college with values of form-inputs
            $college = $this->Colleges->patchEntity($college, $collegeData);

            // save $college
            if ($this->Colleges->save($college)) {
                // send success-message
                $this->Flash->success("College has been updated successfully");

                // redirect to listColleges-page (see listColleges() method)
                return $this->redirect(["action" => "listColleges"]);
            } else {
                $this->Flash->error("Failed to update college");
            }

            // showing Flash messages: see templates/layout/admin.php
        }

        // Create a 'colleges' variable to use in view
        $this->set(compact("college"));

        $this->set("title", "Edit College | Academics Management");
    }

    public function deleteCollege($id = null)
    {
        // Allow both post & delete-methods
        $this->request->allowMethod(["post", "delete"]);
        // Get the college with the id that is passed in URL
        $college = $this->Colleges->get($id);

        // Delete college
        if($this->Colleges->delete($college)) {
            $this->Flash->success("College has been deleted successfully");
        } else {
            $this->Flash->error("Failed to delete college");
        }

        // Redirect to listColleges-page (see listColleges() method)
        return $this->redirect(["action" => "listColleges"]);
    }
}
