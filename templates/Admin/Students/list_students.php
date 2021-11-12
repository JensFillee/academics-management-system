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
                                                <button class="btn btn-info">Allot College</button>
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
// close tag: </script>
$this->Html->scriptEnd();
?>
