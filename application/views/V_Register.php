<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Registration Page</title>
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

<body class="hold-transition register-page">
    <div class="alert" data-alert="<?= $this->session->flashdata('register'); ?>"></div>
    <div class="register-box">
        <div class="register-logo">
            <a href="#"><b>Yeageris</b> Egg</a>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Register a new membership</p>

                <form action="<?= base_url('register'); ?>" method="post">
                    <div class="input-group">
                        <input type="text" class="form-control <?= form_error('name') ? 'is-invalid' : ''; ?>" placeholder="Full name" name="name" value="<?= set_value('name'); ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <?php echo form_error('name', '<small class="text-danger">', '</small>'); ?>
                    <div class="input-group mt-3">
                        <input type="email" class="form-control <?= form_error('email') ? 'is-invalid' : ''; ?>" placeholder="Email" name="email" value="<?= set_value('email'); ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <?php echo form_error('email', '<small class="text-danger">', '</small>'); ?>
                    <div class="input-group mt-3">
                        <input type="password" class="form-control <?= form_error('password') ? 'is-invalid' : ''; ?>" placeholder="Password" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                    <div class="input-group mt-3">
                        <input type="password" class="form-control <?= form_error('password2') ? 'is-invalid' : ''; ?>" placeholder="Retype password" name="password2">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
                    <div class="row mt-3">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                <label for="agreeTerms">
                                    I agree to the <a href="#">terms</a>
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <div class="social-auth-links text-center">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i>
                        Sign up using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i>
                        Sign up using Google+
                    </a>
                </div>

                <a href="<?= base_url('login'); ?>" class="text-center">I already have a membership</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

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
    if (alert == 'success') {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Akun berhasil ditambahkan!',
        });
    } else if (alert == 'failed') {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Terjadi kesalahan!',
            footer: 'Silahkan ulangi beberapa saat lagi.'
        })
    }
    </script>
</body>

</html>