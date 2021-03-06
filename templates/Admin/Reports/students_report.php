<?php
if (!empty($title)) {
    $this->assign("title", $title);
}

// DataTables
$this->html->css([
    "/plugins/datatables-bs4/css/dataTables.bootstrap4.css",
    "buttons.dataTables.min.css" /* no '/' needed because it is in webroot/css directory */
], ["block" => "topStyleLinks"])
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Students Report</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Students Report</li>
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
                        <h3 class="card-title">Students Report</h3>
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
                                                <?php
                                                    /* else: show "Allot College" button */
                                                } else {
                                                    echo "<i>N/A</i>";
                                                }
                                                ?>
                                            </td>
                                            <td><?= strtoupper($student->gender) ?></td>
                                            <td>
                                                <?= $this->Html->image("/" . $student->profile_image, ["style" => "width:70px; height:70px"]) ?>
                                            </td>
                                            <td><?= $student->status == 1 ? "<button class='btn btn-success'>Active</button>" : "<button class='btn btn-danger'>Inactive</button>" ?></td>
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

<!-- DataTables -->
<?=
$this->Html->script([
    "/plugins/datatables/jquery.dataTables.js",
    "/plugins/datatables-bs4/js/dataTables.bootstrap4.js",
    "dataTables.buttons.min.js", /* no '/' needed because it is in webroot/js directory */
    "jszip.min.js",
    "pdfmake.min.js",
    "vfs_fonts.js",
    "buttons.html5.min.js"
], ["block" => "bottomScriptLinks"]);
?>

<?php
// open tag: <script>
$this->Html->scriptStart(["block" => true]);
// content of script tag (for exports)
echo "$('#tbl-students').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );";
// close tag: </script>
$this->Html->scriptEnd();
?>
