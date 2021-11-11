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
                <h3>List Branches</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">List Branches</li>
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
                        <h3 class="card-title">List Branches</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tbl-branches" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Branch Info</th>
                                    <th>College Name</th>
                                    <th>Total Seats</th>
                                    <th>Total Duration (in years)</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (count($branches) > 0) {
                                    foreach ($branches as $branch) {
                                ?>
                                        <tr>
                                            <td><?= $branch->id ?></td>
                                            <td><?= "<b>Name:</b> " .  $branch->name . "<br/><b>Sessions start on: </b>" . $branch->start_date . "<br/><b>Sessions end on: </b>" . $branch->end_date ?></td>
                                            <td><?= $branch->college_id ?></td>
                                            <td><?= $branch->total_seats ?></td>
                                            <td><?= $branch->total_duration ?></td>
                                            <td>
                                                <a href="" class="btn btn-warning"><i class="fa fa-pencil-alt"></i></a>
                                                <a href="" class="btn btn-danger"><i class="fa fa-trash-alt"></i></a>
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
                                    <th>Branch Info</th>
                                    <th>College Name</th>
                                    <th>Total Seats</th>
                                    <th>Total Duration</th>
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
echo '$("#tbl-branches").DataTable();';
// close tag: </script>
$this->Html->scriptEnd();
?>
