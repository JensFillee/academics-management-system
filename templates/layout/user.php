<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Academics Management | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <?=
    $this->Html->css([
        /* Font Awesome */
        "/plugins/fontawesome-free/css/all.min.css",
        /* icheck bootstrap */
        "/plugins/icheck-bootstrap/icheck-bootstrap.min.css",
        /* Theme style */
        "/dist/css/adminlte.min.css"
    ])
    ?>

    <style>
        .login-box {
            margin-top: -70px;
        }
    </style>

</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Academics</b>Management</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <!-- show flash message here if there is any -->
                <?= $this->Flash->render() ?>

                <!-- see login.php (= the form) -->
                <?= $this->fetch("content") ?>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <?= $this->Html->script([
        /* jQuery */
        "/plugins/jquery/jquery.min.js",
        /* Bootstrap 4 */
        "/plugins/bootstrap/js/bootstrap.bundle.min.js",
        /* AdminLTE App */
        "/dist/js/adminlte.min.js"
    ]) ?>

</body>

</html>