    <!-----------------------------------------------Edit Data-------------------------------------------------->
    <div class="modal fade" id="edit-lokasi<?=$id;?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Data Type Barang</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="post">
              <div class="modal-body">
                <div class="form-group">
                  <input type="hidden" class="form-control" id="id" name="id" value="<?=$id;?>">
                  <input type="text" class="form-control" id="id_type" name="id_type" value="<?=$id_type?>" autocomplete="off">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="nama_type" name="nama_type" value="<?=$nama_type?>" autocomplete="off">
                </div>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="submit" class="btn btn-primary" name="updatetype">
                  <i class="fas fa-save"></i>
                  Edit Data
                </button>
              </div>
          </form>
          </div>
        </div>
    </div>
    <!-----------------------------------------------Insert Data------------------------------------------------>