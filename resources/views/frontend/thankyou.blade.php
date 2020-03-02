
<title>Lumea: Thankyou</title>
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
<link rel="stylesheet" type="text/css" href="template/styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="template/styles/cart_responsive.css">
<script src="{{ asset('assets/sweetalert2/sweetalert2.min.js') }}"></script>
<link href="{{ asset('assets/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-css/1.4.6/select2-bootstrap.min.css">

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
              <!-- <div class="hamburger_container">
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
          <section class="indent-1" style="width: 100%;">
        <section>
          
          <div class="container">
            <div>

            <h2> Terimakasih sudah berbelanja di Lumea! </h2>
            <br>
            <h4> Pembayaran ke rekening:</h4>
              <li href="">BNI: <span style="padding-left:100px;">(nomor rekening)</span></li>
              <li href="">BCA: <span style="padding-left:93px;">(nomor rekening)</span></li>
              <li href="">BJB: <span style="padding-left:97px;">(nomor rekening)</span></li>
              <li href="">MANDIRI: <span style="padding-left:65px;">(nomor rekening)</span></li>
              <br>
              
            <h4> Konfirmasi Pembayaran melalui:</h4>
              <li> WhatsApp</li>
              <li> LINE</li>
              <li> SMS</li>
              <br>
            <h4> Format Pembayaran</h4>
              <li> KONFIRMASI_NAMA_TRANSFER_NAMA-BANK (Mohon lampirkan bukti pembayaran)</li>
            </div>
          </div>  
      </section>
          
        </div>


    </section>
</body>

</html>






        