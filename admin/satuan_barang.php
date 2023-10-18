<?php
    include 'Notifikasi/pagination_satuan.php';
    include 'Base/header.php';
    include 'Base/navbar.php';
?>
<script>
// Fungsi untuk membersihkan parameter pencarian dalam URL
  function clearSearchParam() {
    const url = new URL(window.location.href);
    url.searchParams.delete('nama_type');
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
            <h1 class="m-0">Satuan Barang</h1>
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
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#print">
                <i class="far fa-arrow-alt-circle-up"></i>
                  Print Data
                </button>
                </h3>

                <div class="card-tools">
                      <div class="input-group input-group-sm" style="width: 150px;">
                          <input class="form-control float-right" placeholder="Search">
                          <div class="input-group-append">
                              <button class="btn btn-default" data-toggle="modal" data-target="#print">
                                  <i class="fas fa-search"></i>
                              </button>
                          </div>
                      </div>
              </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Satuan</th>
                      <th>Keterangan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = ($currentPage - 1) * $dataPerPage + 1;
                    while ($data = mysqli_fetch_array($result)) {
                        $id         = $data['id'];
                        $qty        = $data['qty'];
                        $keterangan = $data['keterangan'];
                    ?>
                    <tr>
                      <td><?=$i++;?></td>
                      <td><?=$qty;?></td>
                      <td><?=$keterangan;?></td>
                      <td>
                      <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-satuan<?=$id;?>">
                      <i class="far fa-edit"></i>
                          Edit
                      </button>
                      <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus-satuan<?=$id;?>">
                      <i class="fas fa-trash-alt"></i>
                          Hapus
                      </button>
                      </td>
                      <!--Form Edit & Hapus-->
                      <?php include
                        'Editdata/edit_satuan.php';
                       ?>
                       <?php include
                        'Hapusdata/hapus_satuan.php';
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
                          <a href='type_barang.php?page=$prevPage&lokasi=$keyword' class='page-link'>
                            <i class='fas fa-angle-double-left'></i> 
                          </a>";
                      }

                      echo "<a class=page-link>$currentPage</a>";

                      if ($currentPage < $totalPages) {
                          $nextPage = $currentPage + 1;
                          echo "
                          <a href='type_barang.php?page=$nextPage&lokasi=$keyword' class='page-link'>
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
              <h4 class="modal-title">Tambah Data Satuan Barang</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="post">
              <div class="modal-body">
                <div class="form-group">
                  <input type="hidden" class="form-control" id="id" name="id">
                  <input type="text" class="form-control" id="qty" name="qty" placeholder="Nama Qty" autocomplete="off" required>
                </div><div class="form-group">
                  <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" autocomplete="off" required>
                </div>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="submit" class="btn btn-primary" name="addsatuan">
                  <i class="fas fa-save"></i>
                  Simpan Data
                </button>
              </div>
          </form>
          </div>
        </div>
    </div>
    <!-----------------------------------------------Insert Data------------------------------------------------>



        <!-----------------------------------------------Search Data-------------------------------------------------->
        <div class="modal fade" id="print">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Ooopss......!!</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="post">
              <div class="modal-body">
                <div class="form-group">
                  <b>Upgrade terlebih dahulu ke Versi Berikutnya</b>
                </div>
              </div>
          </form>
          </div>
        </div>
    </div>
    <!-----------------------------------------------Search Data------------------------------------------------>

<?php
    include 'Base/footer.php';
    include 'Notifikasi/notifikasi.php';
?>

</body>
</html>
