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
                <h3>List Colleges</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">List Colleges</li>
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
                        <h3 class="card-title">List Colleges</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tbl-colleges" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>College Info</th>
                                    <th>Short Name</th>
                                    <th>Cover Image</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (count($colleges) > 0) {
                                    foreach ($colleges as $index => $college) {
                                ?>
                                        <tr>
                                            <td><?= $college->id ?></td>
                                            <td><?= "<b>Name: </b>" . $college->name . "<br/><b>Email: </b>" . $college->email . "<br/><b>Phone number: </b>" . $college->contact_number ?></td>
                                            <td><?= $college->short_name ?></td>
                                            <td><?= $this->Html->image("/" . $college->cover_image, ["style" => "width:70px;height:70px"]) ?></td> <!-- '/' because not in img-folder -->
                                            <td>
                                                <!-- form that goes to deleteCollege()-method with hidden input-field to give ID to controller (?)-->
                                                <?=
                                                $this->Form->create($college, [
                                                    "id" => "frm-delete-college-" . $college->id,
                                                    "action" => $this->Url->build('/admin/delete-college/' . $college->id, ['fullBase' => true]),
                                                    "type" => "delete"
                                                ])
                                                ?>
                                                <input type="hidden" value="<?= $college->id ?>" name="id">
                                                <?=
                                                $this->Form->end()
                                                ?>
                                                <!-- Form that doesn't work -->
                                                <!-- <form id="frm-delete-college-<?= $college->id ?>" action="<?= $this->Url->build('/admin/delete-college/' . $college->id, ['fullBase' => true]) ?>" method="post">
                                                    <input type="hidden" value="<?= $college->id ?>" name="id">
                                                </form> -->

                                                <a href="<?= $this->Url->build('/admin/edit-college/' . $college->id, ['fullBase' => true]) ?>" class="btn btn-warning"><i class="fa fa-pencil-alt"></i></a>
                                                <!-- show a confirm-box -> submit form -->
                                                <!-- href="javascript:void(0)" makes sure browser doesn't open a plain-text page with the result of the javascript-event -->
                                                <a href="javascript:void(0)" onclick="if( confirm('Are you sure you want to delete this college?') ) { $('#frm-delete-college-<?= $college->id ?>').submit() }" class="btn btn-danger"><i class="fa fa-trash-alt"></i></a>
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
                                    <th>College Info</th>
                                    <th>Short Name</th>
                                    <th>Cover Image</th>
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
echo '$("#tbl-colleges").DataTable();';
// close tag: </script>
$this->Html->scriptEnd();
?>
