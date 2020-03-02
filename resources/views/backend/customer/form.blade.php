<div class="modal" id="modal-form" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="form-customer" method="post" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
                {{ csrf_field() }} {{ method_field('POST') }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> &times; </span>
                    </button>
                    <h3 class="modal-title"></h3>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="id" name="id">
                    <div class="form-group">
                        <label for="name" class="col-md-3 control-label">Nama </label>
                        <div class="col-md-6">
                            <input type="text" id="Nama" name="Nama" class="form-control" autofocus required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="name" class="col-md-3 control-label">Alamat</label>
                      <div class="col-md-6">
                          <input type="text" id="Alamat" name="Alamat" class="form-control" required>
                          <span class="help-block with-errors"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="name" class="col-md-3 control-label">Kota</label>
                      <div class="col-md-6">
                          <input type="text" id="Kota" name="Kota" class="form-control" required>
                          <span class="help-block with-errors"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="name" class="col-md-3 control-label">Kode Pos</label>
                      <div class="col-md-6">
                          <input type="text" id="kode_pos" name="kode_pos" class="form-control" required>
                          <span class="help-block with-errors"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="name" class="col-md-3 control-label">EMAIL</label>
                      <div class="col-md-6">
                          <input type="text" id="email" name="email" class="form-control" required>
                          <span class="help-block with-errors"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="name" class="col-md-3 control-label">No. HP</label>
                      <div class="col-md-6">
                          <input type="text" id="no_hp" name="no_hp" class="form-control" required>
                          <span class="help-block with-errors"></span>
                      </div>
                    </div>
                    <!-- <div class="form-group">
                        <label for="email" class="col-md-3 control-label">Photo</label>
                        <div class="col-md-6">
                            <input type="file" id="photo" name="photo" class="form-control">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div> -->
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-save">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>

            </form>
        </div>
    </div>
</div>
