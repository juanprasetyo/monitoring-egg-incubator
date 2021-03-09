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
console.log(baseurl)
</script>

<!-- Custom monitoring js -->
<script src="<?= base_url('assets/'); ?>js/monitoring.js"></script>
</body>

</html>