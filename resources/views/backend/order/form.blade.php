<div class="modal" id="modal-form" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="form-order" method="post" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
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
                        <label for="name" class="col-md-3 control-label">ID Pelanggan </label>
                        <div class="col-md-6">
                            <select class="form-control" name="CustomerID" id="CustomerID">
                              <option value="" hidden >Pilih...</option>
                            </select>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="name" class="col-md-3 control-label">Nomor Order</label>
                      <div class="col-md-6">
                          <input type="text" id="OrderNumber" name="OrderNumber" class="form-control" required>
                          <span class="help-block with-errors"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="name" class="col-md-3 control-label">ID Pembayaran</label>
                      <div class="col-md-6">
                          <select class="form-control" name="PaymentType" id="PaymentType">
                              <option value="" hidden >Pilih...</option>
                            </select>
                          <span class="help-block with-errors"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="name" class="col-md-3 control-label">Tanggal Order</label>
                      <div class="col-md-6">
                          <input type="text" id="OrderDate" name="OrderDate" class="form-control" required>
                          <span class="help-block with-errors"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="name" class="col-md-3 control-label">Status</label>
                      <div class="col-md-6">
                          <input type="text" id="Status" name="Status" class="form-control" required>
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
