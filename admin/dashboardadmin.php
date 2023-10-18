<?php
    include 'Base/header.php';
    include 'Base/navbar.php';
?>
  
  

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Home</h1>
          </div>
        </div>
      </div>
    </div>
    
    <?php include 
      'Count/dashboard.php';
    ?>
    <div class="content">
      <div class="container">
        <div class="row">
          <!----------------------------------------------------------------------->
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $total_user; ?></h3>

                <p>User Aktif</p>
              </div>
              <a href="#" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!----------------------------------------------------------------------->
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $total_stok; ?></h3>

                <p>Data Stok</p>
              </div>
              <a href="stok_barang.php" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!----------------------------------------------------------------------->
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $total_in; ?></h3>

                <p>Material Masuk</p>
              </div>
              <a href="material_in.php" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!----------------------------------------------------------------------->
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $total_out; ?></h3>

                <p>Material Keluar</p>
              </div>
              <a href="material_out.php" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!----------------------------------------------------------------------->
        </div>
      </div>
    </div>
  </div>

<?php
    include 'Base/footer.php';
?>
</body>
</html>
