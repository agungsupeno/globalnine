<?php
    include 'Notifikasi/pagination_lokasi.php';
    include 'Base/header.php';
    include 'Base/navbar.php';
?>
<script>
// Fungsi untuk membersihkan parameter pencarian dalam URL
  function clearSearchParam() {
    const url = new URL(window.location.href);
    url.searchParams.delete('lokasi');
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
            <h1 class="m-0">Lokasi Barang</h1>
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
                      var keyword = "<?php echo isset($_GET['lokasi']) ? $_GET['lokasi'] : '' ?>";
                      var url = 'pdf/lokasi_pdf.php';
                      if (keyword) {
                          url += '?lokasi=' + keyword;
                      }
                      window.open(url, '_blank');
                  }
                  </script>
                </h3>

                <div class="card-tools">
                  <form action="lokasi_barang.php" method="get">
                      <div class="input-group input-group-sm" style="width: 150px;">
                          <input type="text" name="lokasi" class="form-control float-right" placeholder="Search">
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
                      <th>Lokasi</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = ($currentPage - 1) * $dataPerPage + 1;
                    while ($data = mysqli_fetch_array($result)) {
                        $id = $data['id'];
                        $lokasi = $data['lokasi'];
                    ?>
                    <tr>
                      <td><?=$i++;?></td>
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
                        'Editdata/edit_lokasi.php';
                       ?>
                       <?php include
                        'Hapusdata/hapus_lokasi.php';
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
                          <a href='lokasi_barang.php?page=$prevPage&lokasi=$keyword' class='page-link'>
                            <i class='fas fa-angle-double-left'></i> 
                          </a>";
                      }

                      echo "<a class=page-link>$currentPage</a>";

                      if ($currentPage < $totalPages) {
                          $nextPage = $currentPage + 1;
                          echo "
                          <a href='lokasi_barang.php?page=$nextPage&lokasi=$keyword' class='page-link'>
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
              <h4 class="modal-title">Tambah Data Lokasi Barang</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="post">
              <div class="modal-body">
                <div class="form-group">
                  <input type="hidden" class="form-control" id="id" name="id">
                  <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Lokasi" autocomplete="off">
                </div>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="submit" class="btn btn-primary" name="addlokasi">
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
