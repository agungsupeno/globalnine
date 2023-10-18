    <!-----------------------------------------------Edit Data-------------------------------------------------->
    <div class="modal fade" id="edit-material_in<?=$id;?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Data Stok Barang</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="post">
              <div class="modal-body">
              <div class="form-group">
                <input type="hidden" class="form-control" id="id" name="id" value="<?=$id;?>">
                <input type="text" class="form-control" id="no_req" name="no_req" value="<?=$no_req?>" autocomplete="off">
                </div>
                <div class="form-group">
                  <input type="date" class="form-control" id="tgl" name="tgl" value="<?=$tgl?>" autocomplete="off">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="nama_type" name="nama_type" value="<?=$nama_type?>" disabled>
                </div>
                <div class="form-group">
                  <input type="hidden" class="form-control" id="kode_barang" name="kode_barang" value="<?=$kode_barang?>" disabled>
                  <input type="text" class="form-control" id="material" name="material" value="<?=$material?>" disabled>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="jml" name="jml" value="<?=$jml?>" disabled>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="qty" name="qty" value="<?=$qty?>" autocomplete="off">
                </div>
                <div class="form-group">
                    <select class="form-control" id="lokasi" name="lokasi">
                        <option><?=$lokasi?></option>
                        <?php
                        $query_type = "SELECT * FROM tb_lokasi";
                        $result_type = mysqli_query($koneksi, $query_type);
                        while ($type = mysqli_fetch_assoc($result_type)) {
                            echo '<option value="' . $type['lokasi'] . '">' . $type['lokasi'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="submit" class="btn btn-primary" name="updatematerialin">
                  <i class="fas fa-save"></i>
                  Edit Data
                </button>
              </div>
          </form>
          </div>
        </div>
    </div>
    <!-----------------------------------------------Insert Data------------------------------------------------>