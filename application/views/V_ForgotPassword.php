<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Forgot Password</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
    <div class="alert" data-alert="<?= $this->session->flashdata('notif') ?>"></div>
    <?php $this->session->set_flashdata('notif', '') ;?>
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><img src="<?= base_url('assets/'); ?>img/logo/logo-rectangle-black.svg" alt="Logo Yeagerist" style="height: 100px;"></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>

                <form action="<?= base_url('forgot_password'); ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email" value="<?= set_value('email'); ?>">
                        <div class=" input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        <?= form_error('email', '<small class="text-danger ml-1 mt-2">', '</small>'); ?>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Request new password</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <p class="mt-3 mb-1">
                    <a href="<?= base_url('login'); ?>">Login</a>
                </p>
                <p class="mb-0">
                    <a href="<?= base_url('register'); ?>" class="text-center">Register a new account</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Sweet Alert -->
    <script src="<?= base_url('assets/'); ?>plugins/sweetalert2/sweetalert2.all.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/'); ?>js/adminlte.min.js"></script>
    <script>
    let alert = $('.alert').data('alert');
    if (alert == 'error') {
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Email tidak ditemukan!',
        })
    }
    </script>
</body>

</html>