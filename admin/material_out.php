<?php


include 'Base/header.php';
include 'Base/navbar.php';
include 'Search/js_material_out.php';

?>

  
  

  <div class="content-wrapper">
    <div class="content-header">
       
    </div>
    

    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">

            <div class="card card-danger card-outline">
              <div class="card-header">
                <h5 class="card-title m-0">Form Material Keluar</h5>
              </div>
              <div class="card-body">
              <form method="post">
                <div class="row">
                    <!------------------------------------------------------------->
                    <div class="col-6">
                      <input type="hidden" id="id" name="id">
                      <input type="text" name="no_req" id="no_req" class="form-control" placeholder="No. Req" required>
                    </div>
                    <div class="col-6">
                      <input type="date" id="tgl" name="tgl" class="form-control" required>
                    </div>
                    
                    <!------------------------------------------------------------->
                    <br><br>
                    <!------------------------------------------------------------->
                    <div class="col-6">
                      <select class="form-control" id="nama_type" name="nama_type" required>
                        <option value="">Type</option>
                        <?php
                        $query_type = "SELECT DISTINCT nama_type FROM tb_stok";
                        $result_type = mysqli_query($koneksi, $query_type);
                        while ($type = mysqli_fetch_assoc($result_type)) {
                          echo '<option value="' . $type['nama_type'] . '">' . $type['nama_type'] . '</option>';
                        }
                        ?>
                      </select>
                    </div>
                    <div class="col-6">
                      <select class="form-control" id="kode_barang" name="kode_barang">
                        <option value="">Barang</option>
                        <!-- Ini akan diisi dengan hasil Ajax -->
                      </select>
                    </div>
                    <!------------------------------------------------------------->
                    <br><br>
                    <!------------------------------------------------------------->
                    <div class="col-6">
                      <select class="form-control" id="material" name="material">
                        <option value="">Material</option>
                        <!-- Ini akan diisi dengan hasil Ajax -->
                      </select>
                    </div>
                    <div class="col-6">
                      <input type="text" id="jml" name="jml" class="form-control" placeholder="Jumlah" required>
                    </div>
                    <br><br>
                    <!------------------------------------------------------------->
                    <div class="col-6">
                      <select class="form-control" id="qty" name="qty" required>
                        <option value="">Satuan</option>
                        <?php
                        $query_qty = "SELECT qty FROM tb_satuan";
                        $result_qty = mysqli_query($koneksi, $query_qty);
                        while ($qty = mysqli_fetch_assoc($result_qty)) {
                          echo '<option value="' . $qty['qty'] . '">' . $qty['qty'] . '</option>';
                        }
                        ?>
                      </select>
                      </div>
                    <div class="col-6">
                      <select class="form-control" id="lokasi" name="lokasi" required>
                        <option value="">Lokasi</option>
                        <?php
                        $query_lokasi = "SELECT lokasi FROM tb_lokasi";
                        $result_lokasi = mysqli_query($koneksi, $query_lokasi);
                        while ($lokasi = mysqli_fetch_assoc($result_lokasi)) {
                          echo '<option value="' . $lokasi['lokasi'] . '">' . $lokasi['lokasi'] . '</option>';
                        }
                        ?>
                      </select>
                      </div><br><br>
                      <button type="submit" class="btn btn-primary" name="addmaterialout">
                        <i class="fas fa-save"></i>
                        Simpan Data
                      </button>
                  </div>
              </form>
              </div>
            </div>
          </div>

          <div class="col-lg-8">

            <div class="card card-danger card-outline">
              <div class="card-header">
                <h5 class="card-title m-0">Data Material Keluar</h5>
                <div class="card-tools">
                  <form action="material_out.php" method="get">
                      <div class="input-group input-group-sm" style="width: 500px;">
                      <!----------------------------------------------------------->
                          Cari Data Mulai &nbsp;&nbsp;&nbsp;
                          <input type="date" name="start_date" class="form-control">
                          <!----------------------------------------------------------->
                          &nbsp;&nbsp;&nbsp;Sampai&nbsp;&nbsp;&nbsp;
                          <input type="date" name="end_date" class="form-control">
                          <div class="input-group-append">
                              <button type="submit" class="btn btn-default">
                                  <i class="fas fa-search"></i>
                              </button>
                          </div>
                      </div>
                  </form>
				        </div>
              </div>
              <div class="card-body">
              <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>No Req</th>
                      <th>Material</th>
                      <th>Jenis</th>
                      <th>Jumlah</th>
                      <th>Qty</th>
                      <th>Lokasi</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $ambildata = mysqli_query($koneksi, $query);
                    $i = ($halaman - 1) * $jumlah_data_per_halaman + 1;
                    while ($data = mysqli_fetch_array($ambildata)) {

                        $tgl        = date('d-m-Y', strtotime($data['tgl']));
                        $no_req     = $data['no_req'];
                        $material   = $data['material'];
                        $nama_type  = $data['nama_type'];
                        $jml        = $data['jml'];
                        $qty        = $data['qty'];
                        $lokasi     = $data['lokasi'];
                        $id         = $data['id'];

                        ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $tgl; ?></td>
                            <td><?= $no_req; ?></td>
                            <td><?= $material; ?></td>
                            <td><?= $nama_type; ?></td>
                            <td><?= $jml; ?></td>
                            <td><?= $qty; ?></td>
                            <td><?= $lokasi; ?></td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-material_in<?= $id; ?>">
                                    <i class="far fa-edit"></i>
                                </button>
                            </td>
                            <?php include 'Editdata/edit_material_out.php'; ?>
                        </tr>
                        <?php
                    }
                    ?>
                  </tbody>                 
                </table>
                <table>
                  <thead>
                    <tr>
                      <td>
                        <button class="btn btn-danger btn-sm" onclick="cetakData()">
                        <i class="fas fa-cloud-upload-alt"></i>
                          Cetak Data
                        </button>
                        <script>
                        function cetakData() {
                            var startDate = '<?php echo $startDate; ?>';
                            var endDate = '<?php echo $endDate; ?>';
                            var printUrl = 'pdf/material_out_pdf.php?start_date=' + startDate + '&end_date=' + endDate;
                            window.open(printUrl, '_blank');
                        }
                        </script>
                      </td>
                      <td>
                      <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <?php
                                if ($halaman > 1) {
                                    echo '
                                    <a class="page-link" href="?halaman=' . ($halaman - 1) . $dateParams . '">
                                    <i class="fas fa-angle-double-left"></i>
                                    </a>
                                    ';
                                }
                                echo '<a class="page-link">' . $halaman . '</a>';

                                if ($halaman < $jumlah_halaman) {
                                    echo '
                                    <a class="page-link" href="?halaman=' . ($halaman + 1) . $dateParams . '">
                                    <i class="fas fa-angle-double-right"></i>
                                    </a>';
                                }
                                ?>
                            </ul>
                      </nav>
                      </td>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php
    include 'Base/footer.php';
    include 'Notifikasi/notifikasi.php';
    include 'Web/material_out.php';
    include 'Search/s_material_out.php';
?>

      
</body>
</html>
