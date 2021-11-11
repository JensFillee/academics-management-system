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
    #frm-edit-branch label.error {
        color: red;
    }
</style>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Edit Branch</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Edit Branch</li>
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
                        <h3 class="card-title">Edit Branch</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <?=
                        $this->Form->create($branch, [
                            "id" => "frm-edit-branch",
                        ])
                        ?>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name">Name*</label>
                                    <input type="text" value="<?= $branch->name ?>" required name="name" id="name" placeholder="Enter name" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" id="description" placeholder="Enter text"><?= $branch->description ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="college_id">Select College*</label>
                                    <select required class="form-control" name="college_id" id="college_id">
                                        <option value="">Choose College</option>
                                        <?php
                                        if (count($colleges) > 0) {
                                            foreach ($colleges as $index => $college) {
                                        ?>
                                                <option <?= $branch->college_id == $college->id ? "selected" : "" ?> value="<?= $college->id ?>"> <?= strtoupper($college->name) ?> </option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="total_seats">Number of Seats*</label>
                                    <input type="number" value="<?= $branch->total_seats ?>" min="150" class="form-control" required name="total_seats" id="total_seats" placeholder="Enter number of seats"></input>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="start_date">Session Start Date*</label>
                                    <input type="text" value="<?= $branch->start_date ?>" required name="start_date" id="start_date" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="end_date">Session End Date*</label>
                                    <input type="text" value="<?= $branch->end_date ?>" required name="end_date" id="end_date" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="total_duration">Duration (in years)*</label>
                                    <input class="form-control"  value="<?= $branch->total_duration ?>" type="number" required name="total_duration" id="total_duration" placeholder="Enter duration">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="status">Status*</label>
                                    <select required class="form-control" name="status" id="status">
                                        <option <?= $branch->status == 1 ? "selected" : "" ?> value="1">Active</option>
                                        <option <?= $branch->status == 0 ? "selected" : "" ?> value="0">Inactive</option>
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
echo '$("#frm-edit-branch").validate();';
echo 'pickmeup("input#start_date", { hide_on_select: true, position: "right"}).set_date("'. $branch->start_date .'");'; /* by default: takes today as default date instead of date of branch */
echo 'pickmeup("input#end_date", { hide_on_select: true, position: "right"}).set_date("'. $branch->end_date .'");'; /* by default: takes today as default date instead of date of branch */
// close tag: </script>
$this->Html->scriptEnd();
?>
