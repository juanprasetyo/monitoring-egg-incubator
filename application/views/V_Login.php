<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><img src="<?= base_url('assets/'); ?>img/logo/logo-rectangle-black.svg" alt="Logo Yeagerist" style="height: 100px;"></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <!-- <div class="alert" data-alert="<= $this->session->flashdata('notif') ? $this->session->flashdata('notif') : 'kosong' ; ?>"></div> -->
            <div class="alert" data-alert="<?= $this->session->flashdata('notif') ?>"></div>
            <?php $this->session->set_flashdata('notif', '') ;?>
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="<?= base_url('login'); ?>" method="post">
                    <div class="input-group">
                        <input type="email" class="form-control <?= form_error('email') ? 'is-invalid' : ''; ?>" placeholder="Email" name="email" value="<?= set_value('email'); ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                    <div class="input-group mt-3">
                        <input type="password" class="form-control <?= form_error('password') ? 'is-invalid' : ''; ?>" placeholder="Password" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                    <div class="row mt-3">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <p class="mb-1">
                    <a href="forgot-password.html">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a href="<?= base_url('register'); ?>" class="text-center">Register a new membership</a>
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
    <!-- Sweet Alery -->
    <script src="<?= base_url('assets/'); ?>plugins/sweetalert2/sweetalert2.all.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/'); ?>js/adminlte.min.js"></script>
    <script>
    let alert = $('.alert').data('alert');
    if (alert == 'error_email') {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Gagal!',
            footer: 'Email yang anda masukkan belum terdaftar!'
        })
    } else if (alert == 'error_password') {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Gagal!',
            footer: 'Password yang anda masukkan salah!'
        })
    } else if (alert == 'error_login') {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Gagal!',
            footer: 'Anda harus login dahulu!'
        })
    } else if (alert == 'logout') {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Berhasil Logout!'
        })
    }
    </script>
</body>

</html>