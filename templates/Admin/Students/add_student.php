<?php
if (!empty($title)) {
    $this->assign("title", $title);
}
?>

<!-- css file for datepicker-plugin -->
<?=
$this->Html->css("pickmeup.css", ["block" => "topStyleLinks"])
?>

<style>
    #frm-add-student label.error {
        color: red;
    }
</style>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Add Student</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Add Student</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements disabled -->
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Add Student</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <?=
                        $this->Form->create($student, [
                            "id" => "frm-add-student",
                            "type" => "file"
                        ])
                        ?>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name">Name*</label>
                                    <input type="text" required name="name" id="name" placeholder="Enter name" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email">Email*</label>
                                    <input type="text" required name="email" id="email" placeholder="Enter email" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="phone_no">Phone Number*</label>
                                    <input type="text" class="form-control" required name="phone_no" id="phone_no" placeholder="Enter phone number"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="location">Address*</label>
                                    <textarea class="form-control" required name="address" id="address" placeholder="Enter address"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="gender">Select Gender*</label>
                                    <select required class="form-control" name="gender" id="gender">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="others">Others</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="blood_group">Select Bloodgroup*</label>
                                    <select required class="form-control" name="blood_group" id="blood_group">
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="profile_image">Profile Image*</label>
                                    <input type="file" required name="profile_image" id="profile_image" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="dob">Date of Birth*</label>
                                    <input type="text" required name="dob" id="dob" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="status">Status*</label>
                                    <select required class="form-control" name="status" id="status">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <button name="btn_submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </div>

                        <?= $this->Form->end() ?>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

<?=
$this->Html->script([
    "jquery.validate.min.js",
    "pickmeup.min.js" // for datepicker-plugin
], ["block" => "bottomScriptLinks"]);
?>

<?php
// open tag: <script>
$this->Html->scriptStart(["block" => true]);
// content of script tag
echo '$("#frm-add-student").validate();';
echo 'pickmeup("input#dob", { hide_on_select: true, position: "right"});';
// close tag: </script>
$this->Html->scriptEnd();
?>
