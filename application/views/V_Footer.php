<!-- Modal -->
<div class="modal fade" id="mdlViewProfile" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="mdlViewProfileLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-4">
                            <label for="inputNewImage"><img src="<?= base_url('assets/img/profile/default.png'); ?>" alt="Foto Profile" style="width: 100%;"></label>
                            <input type="file" class="inputNewImage" name="inputNewImage" id="inputNewImage" disabled style="display: none;">
                        </div>
                        <div class="col-lg-1"></div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label for="inputNewName">Nama</label>
                                <input type="text" class="form-control inputNewName" name="inputNewName" id="inputNewName" readonly value="<?= $user['NAME']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="inputNewEmail">Email</label>
                                <input type="email" class="form-control inputNewEmail" name="inputNewEmail" id="inputNewEmail" readonly value="<?= $user['EMAIL']; ?>">
                            </div>
                            <p>Member Since <?= date('d M Y', $user['DATE_CREATE']); ?></p>
                        </div>
                        <div class="col-lg-1"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
    </div>
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->
<footer class="main-footer">
    <!-- Default to the left -->
    <strong>Copyright &copy; <?= date('Y'); ?> Yeagerist Egg.</strong> All rights reserved.
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Chart Js -->
<script src="<?= base_url('assets/'); ?>plugins/chartjs/Chart.min.js"></script>
<!-- icheck -->
<script src="<?= base_url('assets/'); ?>plugins/icheck/icheck.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/'); ?>js/adminlte.min.js"></script>

<script>
var baseurl = '<?= base_url(); ?>';
</script>

<!-- Custom monitoring js -->
<script src="<?= base_url('assets/'); ?>js/monitoring.js"></script>
<!-- Custom user -->
<script src="<?= base_url('assets/'); ?>js/user.js"></script>
</body>

</html>