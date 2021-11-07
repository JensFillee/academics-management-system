<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Load title based on what title is set to in View (ex. $this->assign("title", $title); [$title comes from Controller: $this->set("title", "Add College | Academics Management");]) -->
    <title><?= $this->fetch("title") ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- < ?= xxx ? > is a shortcut for < ? php echo xxx; ? > -->
    <?=
    $this->Html->css([
        // edit path (put '/' in front) because otherwise (by default) it will look in /css, it has to look in /plugins or /dist instead
        // Font Awesome
        "/plugins/fontawesome-free/css/all.min.css",
        // Tempusdominus Bbootstrap 4
        "/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css",
        // iCheck
        "/plugins/icheck-bootstrap/icheck-bootstrap.min.css",
        // JQVMap
        "/plugins/jqvmap/jqvmap.min.css",
        // Theme style
        "/dist/css/adminlte.min.css",
        // overlayScrollbars
        "/plugins/overlayScrollbars/css/OverlayScrollbars.min.css"
    ])
    ?>
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <!-- insert code from templates/element/top-nav.php -->
        <?= $this->element("top-nav") ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <!-- insert code from templates/element/left-sidebar.php -->
        <?= $this->element("left-sidebar") ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- insert code from view that uses this template here (example: templates/Admin/Dashboards/index.php) -->
            <?= $this->fetch("content") ?>
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; <?php echo date("Y") ?>.</strong>
            All rights reserved by Online Web Tutor.
        </footer>
    </div>
    <!-- ./wrapper -->

    <?=
    $this->Html->script([
        // edit path (put '/' in front) because otherwise (by default) it will look in /js, it has to look in /plugins or /dist instead
        // jQuery
        "/plugins/jquery/jquery.min.js",
        // jQuery UI 1.11.4
        "/plugins/jquery-ui/jquery-ui.min.js",
        // Bootstrap 4
        "/plugins/bootstrap/js/bootstrap.bundle.min.js",
        // Tempusdominus Bootstrap 4
        "/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js",
        // overlayScrollbars
        "/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js",
        // AdminLTE App
        "/dist/js/adminlte.js",
        // AdminLTE dashboard demo (This is only for demo purposes)
        "/dist/js/pages/dashboard.js",
    ])
    ?>

</body>

</html>
