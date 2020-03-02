<!--
<style>
  .uper {
    margin-top: 40px;
  }
</style>

  <h1> <kbd>Category </kbd></h1>
</div> -->
<!-- <button type="button" class="btn btn-primary btn-md" data-toggle="modal"  data-target="#ModalCreate">
    Tambah Category
</button>
 -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('assets/bootstrap/favicon.ico') }}">

    <title>Lumea: Product</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    {{-- dataTables --}}
    <link href="{{ asset('assets/datatables/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">

      {{-- SweetAlert2 --}}
      <script src="{{ asset('assets/sweetalert2/sweetalert2.min.js') }}"></script>
      <link href="{{ asset('assets/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="{{ asset('assets/bootstrap/css/ie10-viewport-bug-workaround.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/bootstrap/css/navbar-fixed-top.css') }}" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="{{ asset('assets/bootstrap/js/ie-emulation-modes-warning.js') }}"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<body>

  <!-- Fixed navbar -->
 <!--    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">CRUD Ajax</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about"></a></li>
            <li><a href="#contact"></a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="/">Fixed top <span class="sr-only">(current)</span></a></li>
          </ul>
        </div></.nav-collapse -->
      <!-- </div>
    </nav> -->

<div class="container">

      <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Daftar Produk
                        <a onclick="addForm()" class="btn btn-primary pull-right" style="margin-top: -8px;">Tambah Produk</a>
                    </h4>
                </div>
                <div class="panel-body">
                    <table id="product-table" class="table table-striped">
                        <thead>
                            <tr>
                                <th width="30">No.</th>
                                <th>Kategori</th>
                                <th>SKU</th>
                                <th>Nama Produk</th>
                                <th>Deskripsi Produk</th>
                                <th>QTY</th>
                                <th>Price</th>
                                <th>Ukuran Tersedia</th>
                                <th>Warna Tersedia</th>
                                <th>Ukuran</th>
                                <th>Warna</th>
                                <th>Foto</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
      </div>

      @include('backend.product.form')

    </div>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" ></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css"> -->


<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<!--     <script src="{{ ('https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.6/dist/loadingoverlay.min.js')}}"></script>
    <script src= "{{ ('https://cdn.jsdelivr.net/npm/jquery@3.1/dist/jquery.min.js') }}"></script> -->
    <script src="{{ asset('assets/jquery/jquery-1.12.4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/loading/loading.min.js')  }}"></script>


    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>

    {{-- dataTables --}}
    <script src="{{ asset('assets/dataTables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/dataTables/js/dataTables.bootstrap.min.js') }}"></script>

    {{-- Validator --}}
    <script src="{{ asset('assets/validator/validator.min.js') }}"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{ asset('assets/bootstrap/js/ie10-viewport-bug-workaround.js') }}"></script>

    <script type="text/javascript">

      var table = $('#product-table').DataTable({
                      processing: false,
                      serverSide: true,
                      ajax: "{{ route('product.table') }}",
                      columns: [
                        {data: 'id', name: 'id'},
                        {data: 'CategoryID', name: 'CategoryID'},
                        {data: 'SKU', name: 'SKU'},
                        {data: 'ProductName', name: 'ProductName'},
                        {data: 'ProductDescription', name: 'ProductDescription'},
                        {data: 'QTY', name: 'QTY'},
                        {data: 'Price', name: 'Price'},
                        {data: 'AvailSize', name: 'AvailSize'},
                        {data: 'AvailColor', name: 'AvailColor'},
                        {data: 'Size', name: 'Size'},
                        {data: 'Color', name: 'Color'},
                        {data: 'photo', name: 'photo' },
                        {data: 'action', name: 'action', orderable: false, searchable: false}
                      ]
                    });

      function addForm() {

        save_method = "add";
        $('input[name=_method]').val('POST');
        $('#modal-form').modal('show').LoadingOverlay("show").LoadingOverlay("hide", true);;
        $('#modal-form form')[0].reset();
        $('.modal-title').text('Tambah Product');
             $.ajax({
          url: "{{ url('product') }}" + '/' + "create" ,
          type: "GET",
          dataType: "JSON",
          success: function(data) {

            $('#CategoryID').html(data.Category);
          },
          error : function() {
              alert("Nothing Data");
          }
        });
      }

      function editForm(id) {
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        save_method = 'edit';
        $('input[name=_method]').val('PATCH');
        $('#modal-form form')[0].reset();
        $.ajax({
          url: "{{ url('product') }}" + '/' + "edit" + "/" + id ,
          type: "GET",
          dataType: "JSON",
          success: function(data) {
            $('#modal-form').modal('show');
            $('.modal-title').text('Ubah Product');
            $('#CategoryID').html(data.Category);
            $('#id').val(data.Product.id);
            $('#CategoryID').val(data.Product.CategoryID);
            $('#SKU').val(data.Product.SKU);
            $('#ProductName').val(data.Product.ProductName);
            $('#ProductDescription').val(data.Product.ProductDescription);
            $('#QTY').val(data.Product.QTY);
            $('#Price').val(data.Product.Price);
            $('#AvailSize').val(data.Product.AvailSize);
            $('#AvailColor').val(data.Product.AvailColor);
            $('#Size').val(data.Product.Size);
            $('#Color').val(data.Product.Color);




          },
          error : function() {
              alert("Nothing Data");
          }
        });
      }

      function deleteData(id){
          var csrf_token = $('meta[name="csrf-token"]').attr('content');
          swal({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              type: 'warning',
              showCancelButton: true,
              cancelButtonColor: '#d33',
              confirmButtonColor: '#3085d6',
              confirmButtonText: 'Yes, delete it!'
          }).then(function () {

              $.ajax({
                  url : "{{ url('product/delete') }}" + '/' + id,
                  type : "POST",
                  data : {'_method' : 'DELETE', '_token' : csrf_token},
                  success : function(data) {
                      table.ajax.reload();
                      swal({
                          title: 'Success!',
                          text: data.message,
                          type: 'success',
                          timer: '1500'
                      })
                  },
                  error : function () {
                      swal({
                          title: 'Oops...',
                          text: data.message,
                          type: 'error',
                          timer: '1500'
                      })
                  }
              });
          });
        }

      $(function(){
            $('#modal-form form').validator().on('submit', function (e) {
                if (!e.isDefaultPrevented()){
                    var id = $('#id').val();
                    if (save_method == 'add') url = "{{ url('product/add') }}";
                    else url = "{{ url('product/edit') . '/' }}" + id;

                    $.ajax({
                        url : url,
                        type : "POST",
//                        data : $('#modal-form form').serialize(),
                        data: new FormData($("#modal-form form")[0]),
                        contentType: false,
                        processData: false,
                        success : function(data) {
                            $('#modal-form').modal('hide');
                            table.ajax.reload();
                            swal({
                                title: 'Success!',
                                text: data.message,
                                type: 'success',
                                timer: '1500'
                            })
                        },
                        error : function(data){
                            swal({
                                title: 'Oops...',
                                text: data.message,
                                type: 'error',
                                timer: '1500'
                            })
                        }
                    });
                    return false;
                }
            });
        });
    </script>
  </body>
</html>
