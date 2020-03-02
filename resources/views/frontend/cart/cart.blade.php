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
<link rel="stylesheet" type="text/css" href="template/styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="template/styles/cart_responsive.css">
<script src="{{ asset('assets/sweetalert2/sweetalert2.min.js') }}"></script>
<link href="{{ asset('assets/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
</head>

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
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>

   <!--  <div class="fs_menu_overlay"></div>
    <div class="hamburger_menu">
        <div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
        <div class="hamburger_menu_content text-right">
            <ul class="menu_top_nav">
                <li class="menu_item has-children">
                    <a href="#">
                        usd
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="menu_selection">
                        <li><a href="#">cad</a></li>
                        <li><a href="#">aud</a></li>
                        <li><a href="#">eur</a></li>
                        <li><a href="#">gbp</a></li>
                    </ul>
                </li>
                <li class="menu_item has-children">
                    <a href="#">
                        English
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="menu_selection">
                        <li><a href="#">French</a></li>
                        <li><a href="#">Italian</a></li>
                        <li><a href="#">German</a></li>
                        <li><a href="#">Spanish</a></li>
                    </ul>
                </li>
                <li class="menu_item has-children">
                    <a href="#">
                        My Account
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="menu_selection">
                        <li><a href="#"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
                        <li><a href="#"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>
                    </ul>
                </li>
                <li class="menu_item"><a href="#">home</a></li>
                <li class="menu_item"><a href="#">shop</a></li>
                <li class="menu_item"><a href="#">promotion</a></li>
                <li class="menu_item"><a href="#">pages</a></li>
                <li class="menu_item"><a href="#">blog</a></li>
                <li class="menu_item"><a href="#">contact</a></li>
            </ul>
        </div>
    </div> -->

    <!-- Slider -->
    <div class="container contact_container">
   
       <div class="row" >
       	<div class="col">


       		<!-- <div class="breadcrumbs d-flex flex-row align-items-center">
					<ul>
						<li><a href="index.html">Home</a></li>
						<li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Contact</a></li>
					</ul>
				</div> -->
		</div>
		</div>

	<div class="container">
	<table id="cart" class="table table-hover table-condensed">
    				<thead>
						<tr>
							<th style="width:50%">Produk</th>
							<th style="width:50%">Ukuran</th>
							<th style="width:50%">Warna</th>
							<th style="width:10%">Harga</th>
							<!-- <th style="width:8%">Quantity</th> -->
							<!-- <th style="width:22%" class="text-center">Subtotal</th> -->
							<th style="width:10%"></th>
						</tr>
					</thead>
					
				<!-- 	{{$total = 0}} -->
					
					@foreach ($data as $dat)
					<tbody>
						<tr>
							<div>
							<td data-th="Product">
								<div class="row">
									<div class="col-sm-2 hidden-xs"><img src="{{$dat->photo}}" width="100" height="100"alt="..." class="img-responsive"/></div>
									<div class="col-sm-10">
										<h4 class="nomargin" style="margin-left: 40px">{{$dat->ProductName}} </h4>
										<p style="padding-left: 40px; text-align: left;">{{$dat->ProductDescription}}</p>
									</div>
								</div>
							</td>
							<td data-th="Price">{{$dat->Size}}</td>
							<td data-th="Price">{{$dat->Color}}</td>
							<td data-th="Price">Rp.{{number_format($dat->Price)}}</td>
							<!-- {{$total+= $dat->Price}} -->
<!-- 							<td data-th="Quantity">
								<input type="number" class="form-control text-center" value="1">
							</td> -->
							
							<!-- <td data-th="Subtotal" class="text-center">'''</td> -->
							<div id="{{$dat->id}}" class="deleteData">
							<td  id="{{$dat->id}}" class="deleteData" data-th="">
								<!-- <button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button> -->
								<button class="btn btn-danger btn-sm" ><a id="{{$dat->id}}" class="deleteData"></a><i class="fa fa-trash-o"></i></button>								
							</td>
							</div>
							</div>
							
						</tr>
					</tbody>
					@endforeach
					<tfoot>
							
<!-- 						<tr class="visible-xs">
							<td class="text-center"><strong>Total 1.99</strong></td>
						</tr> -->
						<tr>
							<td><a href="{{route('category-front')}}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Kembali</a></td>
							<td colspan="2" class="hidden-xs"></td>
							<td class="hidden-xs text-center" ><strong>

								
							Rp. {{number_format($total)}}

								

							</strong></td>
							<td><a href="{{route('checkout')}}" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
						</tr>
					</tfoot>
				</table>
		</div>
</div>
 




    <!-- Footer -->

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="footer_nav_container d-flex flex-sm-row flex-column align-items-center justify-content-lg-start justify-content-center text-center">
                        <ul class="footer_nav">
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">FAQs</a></li>
                            <li><a href="contact.html">Contact us</a></li>
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
					title : 'Berhasil dihapus dari keranjang',
					type: 'success',
 					showConfirmButton: false,
  					timer: 750
						})
						location.reload();	
		},
		});
		
	});
		});	




</script>
</body>

</html>
