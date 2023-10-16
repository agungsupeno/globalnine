<?php
    include 'Notifikasi/pagination_stok.php';
    include 'Base/header.php';
    include 'Base/navbar.php';
?>
<script>
// Fungsi untuk membersihkan parameter pencarian dalam URL
  function clearSearchParam() {
    const url = new URL(window.location.href);
    url.searchParams.delete('material');
    history.replaceState(null, '', url.href);
  }
// Panggil fungsi untuk membersihkan parameter pencarian ketika halaman dimuat ulang
  window.onload = clearSearchParam;
</script>
  

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Stok Barang</h1>
          </div>
        </div>
      </div>
    </div>
    

    <div class="content">
      <div class="container">
      <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                <i class="far fa-plus-square"></i>
                    Tambah Data
                </button>
                <button type="button" class="btn btn-success" onclick="printData()">
                <i class="far fa-arrow-alt-circle-up"></i>
                  Print Data
                </button>
                
                  <script>
                  function printData() {
                      var keyword = "<?php echo isset($_GET['material']) ? $_GET['material'] : '' ?>";
                      var url = 'pdf/stok_pdf.php';
                      if (keyword) {
                          url += '?material=' + keyword;
                      }
                      window.open(url, '_blank');
                  }
                  </script>
                </h3>

                <div class="card-tools">
                  <form action="stok_barang.php" method="get">
                      <div class="input-group input-group-sm" style="width: 150px;">
                          <input type="text" name="material" class="form-control float-right" placeholder="Search">
                          <div class="input-group-append">
                              <button type="submit" class="btn btn-default">
                                  <i class="fas fa-search"></i>
                              </button>
                          </div>
                      </div>
                  </form>
              </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode</th>
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
                    $i = ($currentPage - 1) * $dataPerPage + 1;
                    while ($data = mysqli_fetch_array($result)) {
                        $id             = $data['id'];
                        $kode_barang    = $data['kode_barang'];
                        $material       = $data['material'];
                        $nama_type      = $data['nama_type'];
                        $jml            = $data['jml'];
                        $qty            = $data['qty'];
                        $lokasi         = $data['lokasi'];
                    ?>
                    <tr>
                      <td><?=$i++;?></td>
                      <td><?=$kode_barang;?></td>
                      <td><?=$material;?></td>
                      <td><?=$nama_type;?></td>
                      <td><?=$jml;?></td>
                      <td><?=$qty;?></td>
                      <td><?=$lokasi;?></td>
                      <td>
                      <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-lokasi<?=$id;?>">
                      <i class="far fa-edit"></i>
                          Edit
                      </button>
                      <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus-lokasi<?=$id;?>">
                      <i class="fas fa-trash-alt"></i>
                          Hapus
                      </button>
                      </td>
                      <!--Form Edit & Hapus-->
                      <?php include
                        'Editdata/edit_stok.php';
                       ?>
                       <?php include
                        'Hapusdata/hapus_stok.php';
                       ?>
                    </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                  
                </table>
              </div>
              <div class="card-footer1 clearfix !important">
                <ul class="pagination pagination-sm m-0 float-right">
                      <div class="pagination">
                      <?php
                      if ($currentPage > 1) {
                          $prevPage = $currentPage - 1;
                          echo "
                          <a href='stok_barang.php?page=$prevPage&lokasi=$keyword' class='page-link'>
                            <i class='fas fa-angle-double-left'></i> 
                          </a>";
                      }

                      echo "<a class=page-link>$currentPage</a>";

                      if ($currentPage < $totalPages) {
                          $nextPage = $currentPage + 1;
                          echo "
                          <a href='stok_barang.php?page=$nextPage&lokasi=$keyword' class='page-link'>
                            <i class='fas fa-angle-double-right'></i>
                          </a>";
                      }
                      ?>
                  </div>
                </ul>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
<!-----------------------------------------------Insert Data------------------------------------------------>
<div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data Stok Barang</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="post">
              <div class="modal-body">
                <div class="form-group">
                  <input type="hidden" class="form-control" id="id" name="id">
                  <input type="text" class="form-control" id="kode_barang" name="kode_barang" placeholder="Kode Material" autocomplete="off">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="material" name="material" placeholder="Nama Material" autocomplete="off">
                </div>
                <div class="form-group">
                    <select class="form-control" id="nama_type" name="nama_type">
                      <option value="">Pilih Type</option>
                        <?php
                        $query_type = "SELECT * FROM tb_type";
                        $result_type = mysqli_query($koneksi, $query_type);
                        while ($type = mysqli_fetch_assoc($result_type)) {
                            echo '<option value="' . $type['nama_type'] . '">' . $type['nama_type'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="jml" name="jml" placeholder="Jumlah" autocomplete="off">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="qty" name="qty" placeholder="Qty" autocomplete="off">
                </div>
                <div class="form-group">
                    <select class="form-control" id="lokasi" name="lokasi">
                      <option value="">Pilih Lokasi</option>
                        <?php
                        $query_lokasi = "SELECT * FROM tb_lokasi";
                        $result_lokasi = mysqli_query($koneksi, $query_lokasi);
                        while ($lokasi = mysqli_fetch_assoc($result_lokasi)) {
                            echo '<option value="' . $lokasi['lokasi'] . '">' . $lokasi['lokasi'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="submit" class="btn btn-primary" name="addstok">
                  <i class="fas fa-save"></i>
                  Simpan Data
                </button>
              </div>
          </form>
          </div>
        </div>
    </div>
    <!-----------------------------------------------Insert Data------------------------------------------------>

<?php
    include 'Base/footer.php';
    include 'Notifikasi/notifikasi.php';
?>

</body>
</html>
