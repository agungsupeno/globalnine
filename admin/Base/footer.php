<footer class="main-footer">
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>
</div>


<script src="../Controller/plugins/jquery/jquery.min.js"></script>
<script src="../Controller/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../Controller/dist/js/adminlte.min.js"></script>
<script src="../Controller/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- ./Menghapus Response -->
<script>
// Cari parameter "response" dalam URL
if (window.location.href.indexOf('?response=') > -1) {
    // Menghapus parameter "response" dari URL tanpa memuat ulang
    history.replaceState({}, document.title, window.location.pathname);
}
</script>