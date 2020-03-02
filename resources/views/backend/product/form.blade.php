<div class="modal" id="modal-form" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="form-product" method="post" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
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
                        <label for="name" class="col-md-3 control-label">Kategori </label>
                        <div class="col-md-6">
                            <select class="form-control" name="CategoryID" id="CategoryID">
                              <option value="" hidden >Pilih...</option>
                            </select>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="name" class="col-md-3 control-label">SKU</label>
                      <div class="col-md-6">
                          <input type="text" id="SKU" name="SKU" class="form-control" required>
                          <span class="help-block with-errors"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="name" class="col-md-3 control-label">Nama Produk</label>
                      <div class="col-md-6">
                          <input type="text" id="ProductName" name="ProductName" class="form-control" required>
                          <span class="help-block with-errors"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="name" class="col-md-3 control-label">Deskripsi Produk</label>
                      <div class="col-md-6">
                          <input type="text" id="ProductDescription" name="ProductDescription" class="form-control" required>
                          <span class="help-block with-errors"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="name" class="col-md-3 control-label">QTY</label>
                      <div class="col-md-6">
                          <input type="text" id="QTY" name="QTY" class="form-control" required>
                          <span class="help-block with-errors"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="name" class="col-md-3 control-label">Harga</label>
                      <div class="col-md-6">
                          <input type="text" id="Price" name="Price" class="form-control" required>
                          <span class="help-block with-errors"></span>
                      </div>
                    </div>

                     <div class="form-group">
                      <label for="name" class="col-md-3 control-label">Ukuran Tersedia</label>
                      <div class="col-md-6">
                          <input type="text" id="AvailSize" name="AvailSize" class="form-control" required>
                          <span class="help-block with-errors"></span>
                      </div>
                    </div>

                     <div class="form-group">
                      <label for="name" class="col-md-3 control-label">Warna Tersedia</label>
                      <div class="col-md-6">
                          <input type="text" id="AvailColor" name="AvailColor" class="form-control" required>
                          <span class="help-block with-errors"></span>
                      </div>
                    </div>

                     <div class="form-group">
                      <label for="name" class="col-md-3 control-label">Ukuran</label>
                      <div class="col-md-6">
                          <input type="text" id="Size" name="Size" class="form-control" required>
                          <span class="help-block with-errors"></span>
                      </div>
                    </div>

                     <div class="form-group">
                      <label for="name" class="col-md-3 control-label">Warna</label>
                      <div class="col-md-6">
                          <input type="text" id="Color" name="Color" class="form-control" required>
                          <span class="help-block with-errors"></span>
                      </div>
                    </div>

                     <div class="form-group">
                        <label class="col-md-3 control-label">Photo</label>
                        <div class="col-md-6">
                            <input type="file" id="photo" name="photo" class="form-control">
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
