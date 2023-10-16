    <!-----------------------------------------------Hapus Data-------------------------------------------------->
    <div class="modal fade" id="hapus-lokasi<?=$id;?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Hapus Data Lokasi Barang</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="post">
              <div class="modal-body">
                <div class="form-group">
                  <input type="hidden" class="form-control" id="id" name="id" value="<?=$id;?>">
                  Apakah Anda ingin Menghapus data <b><u><?=$nama_type;?></u></b>
                </div>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="submit" class="btn btn-danger" name="hapustype">
                  <i class="fas fa-trash"></i>
                  Hapus Data
                </button>
              </div>
          </form>
          </div>
        </div>
    </div>
    <!-----------------------------------------------Hapus Data------------------------------------------------>