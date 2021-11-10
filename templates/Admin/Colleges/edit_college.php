<?php
if (!empty($title)) {
    $this->assign("title", $title);
}
?>

<style>
    #frm-add-college label.error {
        color: red;
    }
</style>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Edit College</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Edit College</li>
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
                        <h3 class="card-title">Edit College</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- open a <form>-tag with certain attributes -->
                        <?=
                        $this->Form->create($college, [
                            "id" => "frm-edit-college",
                            "type" => "file" /* you need to be able to upload a file */
                        ])
                        ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name">Name*</label>
                                    <input type="text" value="<?= $college->name ?>" required name="name" id="name" placeholder="Enter name" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="short_name">Short Name*</label>
                                    <input type="text" value="<?= $college->short_name ?>" required name="short_name" id="short_name" placeholder="Enter short name" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" id="description" placeholder="Enter text"><?= $college->description ?></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="location">Location*</label>
                                    <textarea class="form-control" required name="location" id="location" placeholder="Enter location"><?= $college->location ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="total_faculty">Number of Faculties*</label>
                                    <input class="form-control" type="number" value="<?= $college->total_faculty ?>" required min="10" name="total_faculty" id="total_faculty" placeholder="Enter number of faculties">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="contact_number">Contact Number*</label>
                                    <input type="text" value="<?= $college->contact_number ?>" name="contact_number" required id="contact_number" placeholder="Enter contact number" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email">Email*</label>
                                    <input type="email" value="<?= $college->email ?>" required name="email" id="email" placeholder="Enter email" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <!-- Not required on edit-page (if left empty -> use old image (see controller)) -->
                                    <label for="cover_image">Cover Image</label>
                                    <input type="file" name="cover_image" id="cover_image" class="form-control">
                                    <br/>
                                    <?= $this->Html->image("/" . $college->cover_image, ["style" => "width:100px; height:100px"]) ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="status">Status*</label>
                                    <select required class="form-control" name="status" id="status">
                                        <option <?= $college->status == 1 ? "selected" : "" ?> value="1">Active</option>
                                        <option <?= $college->status == 0 ? "selected" : "" ?> value="0">Inactive</option>
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
                        <!-- close form-tag: </form> -->
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
$this->Html->script("jquery.validate.min.js", ["block" => "bottomScriptLinks"]);
?>

<?php
// open tag: <script>
$this->Html->scriptStart(["block" => true]);
// content of script tag
echo '$("#frm-edit-college").validate();';
// close tag: </script>
$this->Html->scriptEnd();
?>
