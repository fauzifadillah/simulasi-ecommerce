       <!DOCTYPE html>
<html lang="en">
<head>
<title>Lumea: Checkout</title>
<meta charset="utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Colo Shop Template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="template/styles/bootstrap4/bootstrap.min.css">
<link href="template/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="template/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="template/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="template/plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="template/styles/checkout_styles.css">
<link rel="stylesheet" type="text/css" href="template/styles/cart_responsive.css">
<script src="{{ asset('assets/sweetalert2/sweetalert2.min.js') }}"></script>
<link href="{{ asset('assets/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-css/1.4.6/select2-bootstrap.min.css">
<div class="loading"></div>
</head>
<style>
    .indent-1 {float: left;}
    .indent-1 section {width: 100%; max-height: 400%;margin: 10%; border-radius: 10px;  float: left;}
    .indent-2 {float: right;}
    .indent-2 section {width: 10%; float: right;}
    .super_container {padding: 25px; border: 25px; outline-offset:2px; outline: 3px solid gainsboro;}
</style>
<body>
  <header class="header trans_300">
    <div class="main_nav_container" style="display: inline-block; background: #FFFFFF">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-right">
            <div class="logo_container">
              <a href="{{route('home')}}">LUMEA</a>
            </div>
            <nav class="navbar">
              <!-- <ul class="navbar_menu">
                <li><a href="{{ route('home')}}">home</a></li>
                <li><a href="{{route('category-front')}}">shop</a></li>
                
                
                
                <li><a href="{{route('contact-us')}}">contact</a></li>
              </ul> -->
              @if(Auth::check())
              <ul class="navbar_user">
                <!-- <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li> -->
                
                <li><a href="#"><i aria-hidden="true">{{ Auth::user()->name }}</i></a></li>
                <li class="checkout">
                <a href="{{ route('cart-index') }}">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    <span id="checkout_items" prod_id= "id" class="checkout_items">
                      
                      

                        {{\DB::table('carts')->where('id_buy', \Auth::user()->name )->count()}}

                        
                    </span>
                  </a>
                </li>
              </ul>
              @else
                <ul class="navbar_user">
                <!-- <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li> -->
                
                <li><a href="{{route('login')}}" class="fa fa-user"><i aria-hidden="true" ></i></a></li>
                <li class="checkout">
                <a href="{{ route('cart-index') }}">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    <span id="checkout_items" prod_id= "id" class="checkout_items">
                      
                      

                        {{\DB::table('carts')->count()}}

                        
                    </span>
                  </a>
                </li>
              </ul>
              @endif
<!--               <div class="hamburger_container">
                <i class="fa fa-bars" aria-hidden="true"></i>
              </div> -->
            </nav>
          </div>
        </div>
      </div>
    </div>

  </header>
  

        <!-- Main Navigation -->
        <div class="super_container">

<h2 class="checkout-heading stylish-heading" style="text-align: center;"></h2>
        <section class="indent-1" style="width: 50%;">
        <section>
        <div class="checkout-section"id="submit-form" >
            <div id="submit-form">
                <form action="" method="POST" >
                    {{ csrf_field() }} {{ method_field('POST') }}
                    <br>
                    <br>
                    <br>
                    <br>
                    <h3 style="text-align: justify;"><strong>Detail Pembayaran</strong></h3>
                    <br>
                    <br>
                    <div class="form-group">
                        <label for="email"><strong>Alamat Email</strong></label>
                        @if (auth()->user())
                            <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" required>
                        @else
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="name"><strong>Nama Lengkap</strong></label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat"><strong>Alamat</strong></label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ auth()->user()->alamat }}" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat"><strong>Provinsi</strong></label>
                        <br>
                        <select class="form-control" id="provinsi" name="provinsi" value="">
                                
                      </select>
                   </div>

                    
                        <div class="form-group">
                            <label for="kota"><strong>Kota</strong></label>
                            <!-- <input type="text" class="form-control" id="kota" name="kota" value="{{ auth()->user()->kota }}" required> -->
                            <br>
                            <select class="form-control" id="kota" name="kota" value=""></select>

                        </div>
<!--                         <div class="form-group">
                            <label for="province"><strong>Provinsi</strong></label>
                            <input type="text" class="form-control" id="province" name="province" value="{{ old('province') }}" required>
                        </div> -->
                     <!-- end half-form -->

                    <div class="half-form">
                        <div class="form-group">
                            <label for="kodepos"><strong>Kode Pos</strong></label>
                            <input type="text" class="form-control" id="kodepos" name="kodepos" value="{{ auth()->user()->kodepos }}" required>
                        </div>
                        <div class="form-group">
                            <label for="no_hp"><strong>Nomor Telepon</strong></label>
                            <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ auth()->user()->no_hp }}" required>
                        </div>

                       <div class="form-group">
                        <label for="alamat"><strong>Metode Pembayaran</strong></label>
                        <!-- <input type="text" class="form-control" id="metode" name="metode" value="" placeholder="Metode Pembayaran" required> -->
                        <select class="form-control" name="metode" id="metode">
                            <option value="BCA">Bank BCA</option>
                            <option value="BRI">Bank BRI</option>
                            <option value="MANDIRI">Bank Mandiri</option>
                            <option value="BJB">Bank BJB</option>                                
                        </select>
                        <input type="hidden" id="harga" name="harga" value="">
                         @php
                    $prod = '';
                    @endphp
                        @php
                      foreach ($data as $da){
                      
                      $prod .= $da->id .',';
                    }
                      
                      @endphp
                        <input type="hidden" id="" name="items" value="{{$prod}}">
                    </div>
                       <script type="text/javascript">
                        
                        </script>
                        <button type="submit" id="complete-order" class="btn btn-danger" style="box-shadow: 3px 5px;"><a style="text-shadow: 2px;">Validasi Order</a></button>
                         <button type="submit" id="selesai_button" class="btn btn-success" style="box-shadow: 3px 5px;"><a style="text-shadow: 2px;">Selesaikan Order</a></button>
                    </div>
                </div>
                </section>
              </section> <!-- end half-form -->
              <div class="spacer"></div>


                  <section class="indent-1" style="width: 40%; float: right;">
                    <section>
                      <br>
                      <br>
                      <br>
                      <br>
                      <br>
                      <br>                     
                      <br>                     
                      <br>     
                      <br>
                    <div class="container">
                     <table id="cart" class="table table-hover table-condensed">
                       <thead>
                        <tr>
                            <th style="width:40%; text-align: justify;">Produk</th>
                           <!--  <th style="width:10%"></th>
                            <th style="width:10%"></th> -->
                            <th style="width:10%">Harga</th>
                           <!--  <th style="width:10%"></th> -->
                        </tr>
                      </thead>
          
        <!--  {{$total = 0}} -->
                   
                    @foreach ($data as $dat)
                      
<!--                     {{$tes_prod = $dat->ProductName}}
                    {{$tes_price = $dat->Price}} -->
                    <tbody>
                      <tr>
                        <div>
                        <td data-th="Product">
                          <div class="row">
                           <!--  <div class="col-sm-2 hidden-xs"><img src="{{$dat->photo}}" width="50" height="50"alt="..." class="img-responsive"/></div> -->
                            <div class="col-sm-10">
                              <h4 class="nomargin" id="prod"style="margin-left: 4px; font-size: 13px;">{{$dat->ProductName}} </h4>
                              
                              <!-- <p style="padding-left: 40px; text-align: left;">{{$dat->ProductDescription}}</p> -->
                            </div>
                          </div>

                        </td>
                       <!-- <td data-th="Price">{{$dat->Size}}</td> -->
                        <!-- <td data-th="Price">{{$dat->Color}}</td> -->
                        <td data-th="Price">Rp. {{number_format($dat->Price)}}</td>


              <!-- {{$total+= $dat->Price}}  -->
<!--              <td data-th="Quantity">
                <input type="number" class="form-control text-center" value="1">
              </td> -->
              
              <!-- <td data-th="Subtotal" class="text-center">'''</td> -->
              <!-- <div id="{{$dat->id}}" class="deleteData"> -->
              <!-- <td  id="{{$dat->id}}" class="deleteData" data-th=""> -->
                <!-- <button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button> -->
                <!-- <button class="btn btn-danger btn-sm" ><a id="{{$dat->id}}" class="deleteData"></a><i class="fa fa-trash-o"></i></button> -->               
              </td>
              </div>

              </div>
              
            </tr>
          </tbody>
          @endforeach
          
          <tfoot>
              
<!--            <tr class="visible-xs">
              <td class="text-center"><strong>Total 1.99</strong></td>
            </tr> -->
            <tr>
              
              <td ><a> JNE Reguler (est. 3 - 5 Hari Kerja)</a></td>
              <td><a id="ongkir">Isi form terlebih dahulu!</a> </td>
            </tr>
            <tr>
              
             
              <!-- <td colspan="1" class="hidden-xs"></td> -->
              <td colspan="1" class="hidden-xs" > Total: </td>
              <!-- <td><a href="https://www.paypal.com/webapps/hermes?token=5EY097812P7754247&useraction=commit&mfid=1546377013907_cf1dec6830d7" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td> -->
              <td>    <strong id="tot" >Isi form terlebih dahulu!</strong>  </td>
              <input type="hidden" id="total" value="{{$total}}">
            </tr>
          </tfoot>
        </table>
    </div>
    </section>
 </section>




    <!-- Footer -->



</div>
</div>
    
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="footer_nav_container d-flex flex-sm-row flex-column align-items-center justify-content-lg-start justify-content-center text-center">
                        <ul class="footer_nav">
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">FAQs</a></li>
                            <li><a href="{{route('contact-us')}}">Contact us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="footer_social d-flex flex-row align-items-center justify-content-lg-end justify-content-center">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer_nav_container">
                        <div class="cr">©2018 All Rights Reserverd. This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#">Colorlib</a></div>
                    </div>
                </div>
            </div>
        
    </footer>
  </div>
<script src="template/js/jquery-3.2.1.min.js"></script>
<script src="template/styles/bootstrap4/popper.js"></script>
<script src="template/styles/bootstrap4/bootstrap.min.js"></script>
<script src="template/plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="template/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="template/plugins/easing/easing.js"></script>
<script src="template/js/cart_custom.js"></script>

<!-- Delete Button -->
<script type="text/javascript">
  $(document).ready(function()
    {

          // --------- Add To Cart Button --------- //
              $.ajaxSetup({
              headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   }
                });
                $(".deleteData").click(function() {
          var id = $(this).attr('id');
          var csrf_token = $('meta[name="csrf-token"]').attr('content');
          console.log(id);
          $.ajax({
          type: "GET",
          url : "/checkout-delete" + "/" + id,
          data : {id , '_token' : csrf_token},
          success : function(data){
            console.log(data);
            $("#id_buy").html(data.data);
            // $(".checkout_items").html();
            console.log(id);
          swal({
          title : 'Berhasil terhapus dari Keranjang!',
          type: 'success',
          showConfirmButton: false,
            timer: 750
            })
            location.reload();  
    },
    });
    
  });
    }); 
          // ------------ Sending Data from Form --------------- // 
          $( "#submit-form form" ).on('submit',function() {
            event.preventDefault();
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
              $.ajax({
                      url: '{{route('complete')}} ',
                      type: "POST",
                      data: new FormData($("#submit-form form")[0]), '_token' : csrf_token,
                      processData : false,
                      contentType : false,
                      success: function (result) {
                          // swal("Saved", "This resource was added to your list of saved resources", "success")
                          $('#ongkir').html("Rp. " + result.opsi1.toLocaleString());
                          // var total = #total;
                          var hit = parseInt(result.opsi1);
                          var hit2 = parseInt($('#total').val());
                          $('#jne').html(result.desc);
                          var res = hit + hit2;
                          res = +res.toFixed(2);
                          console.log(res);
                          $('#harga').val(res.toLocaleString());
                          $('#tot').html("Rp. " + res.toLocaleString());
                          // var tes_prod = '{{$prod}}'
                          // $('#items').val(tes_prod);
                            var $input = $('<input type="button" value="" class="btn btn-success" />');
                            $("#selesai_button").removeAttr('disabled');
                            // $("button").replaceWith($input);
                            // $input.replace($("button"));
                        
                      },
                      error: function (result) {
                          console.log();
                          swal({
                      title: "Oops",
                      text: "Terjadi kesalahan pada sistem",
                      icon: "error",
                      button: "Dismiss",
                      timer : 1500
                  })
                      }
                  });  
              // return false;
    });
          // --- Selesaikan Order --- //
          $( "#selesai_button" ).click(function() {
                      event.preventDefault();
                      var csrf_token = $('meta[name="csrf-token"]').attr('content');
                        $.ajax({
                                url: '{{route('complete-banget')}} ',
                                type: "POST",
                                data: new FormData($("#submit-form form")[0]), '_token' : csrf_token,
                                processData : false,
                                contentType : false,
                                success: function (result) {
                                    swal("Selesai!", "Transaksi Berhasil", "success")
                                   location.href = "{{route('thankyou')}}"
                                  
                                },
                                error: function (result) {
                                    console.log();
                                    swal({
                                title: "Oops",
                                text: "Terjadi kesalahan pada sistem",
                                icon: "error",
                                button: "Dismiss",
                                timer : 1500
                            })
                                }
                            });  
                        // return false;
              });          


          $("#kota").change(function(){
            $("#selesai_button").attr('disabled', true); //disable input
          });
          $("#provinsi").change(function(){
            $("#selesai_button").attr('disabled', true); //disable input
          });
          $("#alamat").change(function(){
            $("#selesai_button").attr('disabled', true); //disable input
          });          
          // ------------ SUBMIT FORM ------------- //



</script>

<!-- Select2 Funct. -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.min.js"></script>

<script type="text/javascript">


    
$("#provinsi").select2({
  // THEME BOOTSTRAP BELUM BISA

  placeholder: 'Pilih Provinsi',
});



      $.ajax({
        type : "GET",
        url : "/api",
        dataType : "JSON",

        success : function(data)
        {
         $('#provinsi').html(data.provinsi);
         $(".loading").fadeOut("slow");

        },
        error : function()
        {
          // location.reload();
          alert("Terjadi kesalahan jaringan, coba muat ulang halaman!");
          location.reload();
        }
      });

$("#kota").select2({
  placeholder: 'Pilih Kota/Kabupaten',
});
      $.ajax({
        type : "GET",
        url : "/api/kota",
        dataType : "JSON",

        success : function(data)
        {
         $('#kota').html(data.kota);
         $(".loading").fadeOut("slow");
        },
        error : function()
        {
          alert("Terjadi kesalahan jaringan, coba muat ulang halaman!");
          location.reload();
        }
      });


       // $("#provinsi").select2({

       //  placeholder: "Search for a repository",
       //  minimumInputLength: 1,

       //  ajax: { // instead of writing the function to execute the request we use Select2's convenient helper
       //      url: "/api",
       //      headers : { 
       //        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
       //      },
       //      type : 'GET',
       //      dataType: 'json',
       //      quietMillis: 250,
       //      // data: function (term, page) {
       //      //     return {
       //      //         q: term, // search term
       //      //     };
       //      // },
       //      // results: function (data, page) { // parse the results into the format expected by Select2.
       //      //     // since we are using custom formatting functions we do not need to alter the remote JSON data
       //      //     return { results: data.items };
       //      // },
       //      // cache: true,
       //      success : function(data)
       //      {
       //        console.log(data); 
       //      }
       //  },

       //  // formatResult: repoFormatResult, // omitted for brevity, see the source of this page
       //  // formatSelection: repoFormatSelection,  // omitted for brevity, see the source of this page
       //   // apply css that makes the dropdown taller
       //  escapeMarkup: function (m) { return m; } // we do not want to escape markup since we are displaying html in results
       //      });
     
    </script>
</body>

</html>






        