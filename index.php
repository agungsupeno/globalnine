<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>From Login</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="Controller/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="Controller/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="Controller/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="Controller/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>Admin</b>LTE
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Aplikasi Inventory Barang</p>
		</center>
      <form action="ceklogin.php" method="post">
        <div class="input-group mb-3">
          <input type="text" name="nik" class="form-control" placeholder="NIK">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
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
            <button class="btn btn-primary btn-block" name="login">
              Sign In
            </button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<script src="Controller/plugins/jquery/jquery.min.js"></script>
<script src="Controller/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="Controller/dist/js/adminlte.min.js"></script>
<script src="Controller/plugins/sweetalert2/sweetalert2.min.js"></script>
<script>
$(document).ready(function() {
    // Cek apakah ada notifikasi
    var response = '<?php echo isset($_GET["response"]) ? $_GET["response"] : ""; ?>';

    if (response === "Gagal") {
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Terjadi kesalahan'
        });
    } else if (response === "BelumLogin") {
        Swal.fire({
            icon: 'warning',
            title: 'Gagal',
            text: 'Mohon Login Dulu'
        });
    }
});

if (window.location.href.indexOf("?response=") > -1) {
    history.replaceState({}, document.title, window.location.pathname);
  }

</script>
</script>
</body>
</html>
