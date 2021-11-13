<?php
if (!empty($title)) {
    $this->assign("title", $title);
}

// DataTables
$this->html->css([
    "/plugins/datatables-bs4/css/dataTables.bootstrap4.css"
], ["block" => "topStyleLinks"])
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>List Students</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">List Students</li>
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
                        <h3 class="card-title">List Students</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tbl-students" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Student Info</th>
                                    <th>College/Branch</th>
                                    <th>Gender</th>
                                    <th>Profile Image</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (count($students) > 0) {
                                    foreach ($students as $student) {
                                ?>
                                        <tr>
                                            <td><?= $student->id ?></td>
                                            <td>
                                                <?= "<b>Name:</b> " .  $student->name ?><br />
                                                <?= "<b>Email:</b> " .  $student->email ?><br />
                                                <?= "<b>Phone number:</b> " .  $student->phone_no ?><br />
                                                <?= "<b>Bloodgroup:</b> " .  $student->blood_group ?><br />
                                            <td>
                                                <?php
                                                /* If college & branch names both have a value (not null) */
                                                if (isset($student->student_college->name) && isset($student->student_college->name)) {
                                                    /* Show college & branch */
                                                    echo "<b>College: </b>" . $student->student_college->name;
                                                    echo "<br/>";
                                                    echo "<b>Branch: </b>" . $student->student_branch->name;
                                                    echo "<br/>";
                                                ?>
                                                    <!-- START: THIS IS THE PROBLEM -->
                                                    <?=
                                                    $this->Form->create(null, [
                                                        "id" => "frm-remove-allotment-" . $student->id,
                                                        "action" => $this->Url->build("/admin/remove-assigned-college/" . $student->id),
                                                        "type" => "post"
                                                    ]);
                                                    ?>

                                                    <input type="hidden" name="student_id" id="student_id" value="<?= $student->id ?>">

                                                    <?=
                                                    $this->Form->end();
                                                    ?>
                                                    <!--                                                 <form action="<?= $this->Url->build("/admin/remove-assigned-college/" . $student->id, ["fullBase" => true]) ?>" method="post" id="frm-remove-allotment-<?= $student->id ?>">
                                                    <input type="hidden" name="student_id" id="student_id" value="<?= $student->id ?>">
                                                </form> -->
                                                    <!-- END: THIS IS THE PROBLEM -->

                                                    <!-- Link to change college/branch | Link to remove college/branch -->
                                                    <a href="javascript:void(0)" class="btn-allot-modal" data-id="<?= $student->id ?>" data-toggle="modal" data-target="#mdl-allot-college">Change</a>
                                                    |
                                                    <a href="javascript:void(0)" data-id="<?= $student->id ?>" onclick="if( confirm('Are you sure you want to remove the assigned college and branch of this student?') ) { $('#frm-remove-allotment-<?= $student->id ?>').submit() }">Remove</a>

                                                <?php
                                                    /* else: show "Allot College" button */
                                                } else {
                                                ?>
                                                    <!-- keep student-id in a data-attribute -->
                                                    <button class="btn btn-info btn-allot-modal" data-id="<?= $student->id ?>" data-toggle="modal" data-target="#mdl-allot-college">Allot College</button>
                                                <?php
                                                }
                                                ?>
                                            </td>
                                            <td><?= strtoupper($student->gender) ?></td>
                                            <td>
                                                <?= $this->Html->image("/" . $student->profile_image, ["style" => "width:70px; height:70px"]) ?>
                                            </td>
                                            <td><?= $student->status == 1 ? "<button class='btn btn-success'>Active</button>" : "<button class='btn btn-danger'>Inactive</button>" ?></td>
                                            <td>
                                                <a href="" class="btn btn-warning"><i class="fa fa-pencil-alt"></i></a>
                                                <a href="javascript:void(0)" class="btn btn-danger"><i class="fa fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#ID</th>
                                    <th>Student Info</th>
                                    <th>College/Branch</th>
                                    <th>Gender</th>
                                    <th>Profile Image</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

<!-- Allot College Modal -->
<div class="modal" id="mdl-allot-college">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Assign College & Branch</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <!-- <form id="frm-allot-college" method="post" action="<?= $this->Url->build("/admin/assign-college", ["fullBase" => true]) ?>"> -->

                <?=
                $this->Form->create(null, [
                    "id" => "frm-allot-college",
                    "type" => "post",
                    /* when form is submitted: call the new 'assignCollegeBranch'-function in StudentsController */
                    /* 2 ways to to this (both work) */
                    /* "action" => $this->Url->build("/admin/assign-college", ["fullBase" => true]) */
                    "url" => [
                        "controller" => "Students",
                        "action" => "assignCollegeBranch", /* when form is submitted: call the new 'assignCollegeBranch'-function in StudentsController */
                        "prefix" => "Admin"
                    ]
                ]);
                ?>

                <input type="hidden" id="student_id" name="student_id" value="">

                <div class="form-group">
                    <label for="dd_college">Select college:</label>
                    <select name="college_id" id="dd_college" class="form-control">
                        <option value="">Choose college</option>
                        <?php
                        if (count($colleges) > 0) {
                            foreach ($colleges as $index => $college) {
                        ?>
                                <option value="<?= $college->id ?>"><?= strtoupper($college->name) ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select> <!-- dd = dropdown -->
                </div>
                <div class="form-group">
                    <label for="dd_branch">Select branch:</label>
                    <select name="branch_id" id="dd_branch" class="form-control">
                        <option value="">Choose branch</option>
                    </select> <!-- dd = dropdown -->
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>

                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>

<!-- DataTables -->
<?=
$this->Html->script([
    "/plugins/datatables/jquery.dataTables.js",
    "/plugins/datatables-bs4/js/dataTables.bootstrap4.js"
], ["block" => "bottomScriptLinks"]);
?>

<?php
// open tag: <script>
$this->Html->scriptStart(["block" => true]);
// content of script tag
echo '$("#tbl-students").DataTable();';
// click "Allot College" -> pass student_id to hidden input in modal
echo '$(document).on("click", ".btn-allot-modal", function() {
    /* fill hidden input in modal-form (#student) with student_id (from data-attribute)*/
    var student_id = $(this).attr("data-id");
    $("#student_id").val(student_id);
});';
// change selected college -> show branches of this college (ajax request)
echo '$(document).on("change", "#dd_college", function () {
    /* when selected college changes -> update postdata variable */
    var college_id = $(this).val();
    var postdata = "college_id=" + college_id;
    /* send AJAX GET request */
    /* $.get(URL, data, function) */
    $.get("' . $this->Url->build("/admin/allot-college", ["fullBase" => true]) . '", postdata, function (response) {
        var data = $.parseJSON(response);

        if(data.status) {
            /* put all options in a variable */
            /* default value = only "Choose branch" */
            var branchOptionsHtml = "<option value=\'\'>Choose branch</option>";

            /* add an option foreach branch of selected college (= data.branches (see controller)) */
            $.each(data.branches, function(index, item) {
                branchOptionsHtml += "<option value=\'" + item.id + "\'>" +
                                        item.name +
                                     "</option>"
            });

            /* show the options */
            $("#dd_branch").html(branchOptionsHtml);
        }
    });
});';
// close tag: </script>
$this->Html->scriptEnd();
?>
