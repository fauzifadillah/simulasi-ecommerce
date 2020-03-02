<!DOCTYPE html>
<html lang="en">
<head>
<title>Lumea: Kategori</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Colo Shop Template">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="template/styles/bootstrap4/bootstrap.min.css">
<link href="template/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="template/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="template/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="template/plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="template/plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="template/styles/categories_styles.css">
<link rel="stylesheet" type="text/css" href="template/styles/categories_responsive.css">
      {{-- SweetAlert2 --}}
      <script src="{{ asset('assets/sweetalert2/sweetalert2.min.js') }}"></script>
      <link href="{{ asset('assets/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">

</head>

<body>

<div class="super_container">

	<!-- Header -->

	<header class="header trans_300">

		<!-- Top Navigation -->

		<!-- <div class="top_nav">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="top_nav_left">free shipping on all u.s orders over $50</div>
					</div>
					<div class="col-md-6 text-right">
						<div class="top_nav_right">
							<ul class="top_nav_menu">

								 Currency / Language / My Account -->

								<!-- <li class="currency">
									<a href="#">
										usd
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="currency_selection">
										<li><a href="#">cad</a></li>
										<li><a href="#">aud</a></li>
										<li><a href="#">eur</a></li>
										<li><a href="#">gbp</a></li>
									</ul>
								</li>
								<li class="language">
									<a href="#">
										English
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="language_selection">
										<li><a href="#">French</a></li>
										<li><a href="#">Italian</a></li>
										<li><a href="#">German</a></li>
										<li><a href="#">Spanish</a></li>
									</ul>
								</li>
								<li class="account">
									<a href="#">
										My Account
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="account_selection">
										<li><a href="#"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
										<li><a href="#"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div> --> 

		<!-- Main Navigation -->

		<div class="main_nav_container">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-right">
						<div class="logo_container">
							<a href="#">LUMEA</a>
						</div>
						<nav class="navbar">
							<ul class="navbar_menu">
								<li><a href="{{ route('home')}}">home</a></li>
								<li><a href="{{route('category-front')}}">shop</a></li>
								
								
								
								<li><a href="{{route('contact-us')}}">contact</a></li>
							</ul>
							@if(Auth::check())
							<ul class="navbar_user">
								<!-- <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li> -->
								
								<li><a href="{{route('login')}}"><i aria-hidden="true">{{ Auth::user()->name }}</i></a></li>
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
								<!-- <li class="checkout">
								<a href="{{ route('cart-index') }}">
										<i class="fa fa-shopping-cart" aria-hidden="true"></i>
										<span id="checkout_items" prod_id= "id" class="checkout_items">
											
											

												{{\DB::table('carts')->count()}}

												
										</span>
									</a>
								</li> -->
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

	<div class="fs_menu_overlay"></div>

	<!-- Hamburger Menu -->

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
	</div>

	<div class="container product_section_container">
		<div class="row">
			<div class="col product_section clearfix">

				<!-- Breadcrumbs -->

				<div class="breadcrumbs d-flex flex-row align-items-center">
					<ul>
						<li><a href="{{route('home')}}">Home</a></li>
						<li class="active"><a href="{{route('category-front')}}"><i class="fa fa-angle-right" aria-hidden="true"></i>Kategori Produk</a></li>
					</ul>
				</div>

				<!-- Sidebar -->

				<div class="sidebar">
					<div class="sidebar_section">
						<div class="sidebar_title">
							<h5>Kategori Produk</h5>
						</div>
						<ul  id="CategoryName"  class="sidebar_categories">
							<!-- Respon Ajax -->
						</ul>
					</div>

					<!-- Price Range Filtering -->
					<div class="sidebar_section">
						<div class="sidebar_title">
							<h5>Urutkan berdasarkan harga</h5>
						</div>
						<p>
							<input type="text" id="amount" style="border:0; color:#f6931f; font-weight:bold;">
						</p>
						<div id="slider-range"></div>
						<div class="filter_button"><span>filter</span></div>
					</div>

					<!-- Sizes -->
					<!-- <div class="sidebar_section">
						<div class="sidebar_title">
							<h5>Sizes</h5>
						</div>
						<ul class="checkboxes">
							<li><i class="fa fa-square-o" aria-hidden="true"></i><span>S</span></li>
							<li class="active"><i class="fa fa-square" aria-hidden="true"></i><span>M</span></li>
							<li><i class="fa fa-square-o" aria-hidden="true"></i><span>L</span></li>
							<li><i class="fa fa-square-o" aria-hidden="true"></i><span>XL</span></li>
							<li><i class="fa fa-square-o" aria-hidden="true"></i><span>XXL</span></li>
						</ul>
					</div>
 -->
					<!-- Color -->
					<!-- <div class="sidebar_section">
						<div class="sidebar_title">
							<h5>Color</h5>
						</div>
						<ul class="checkboxes">
							<li><i class="fa fa-square-o" aria-hidden="true"></i><span>Black</span></li>
							<li class="active"><i class="fa fa-square" aria-hidden="true"></i><span>Pink</span></li>
							<li><i class="fa fa-square-o" aria-hidden="true"></i><span>White</span></li>
							<li><i class="fa fa-square-o" aria-hidden="true"></i><span>Blue</span></li>
							<li><i class="fa fa-square-o" aria-hidden="true"></i><span>Orange</span></li>
							<li><i class="fa fa-square-o" aria-hidden="true"></i><span>White</span></li>
							<li><i class="fa fa-square-o" aria-hidden="true"></i><span>Blue</span></li>
							<li><i class="fa fa-square-o" aria-hidden="true"></i><span>Orange</span></li>
							<li><i class="fa fa-square-o" aria-hidden="true"></i><span>White</span></li>
							<li><i class="fa fa-square-o" aria-hidden="true"></i><span>Blue</span></li>
							<li><i class="fa fa-square-o" aria-hidden="true"></i><span>Orange</span></li>
						</ul>
						<div class="show_more">
							<span><span>+</span>Show More</span>
						</div>
					</div> -->

				</div>

				<!-- Main Content -->

				<div class="main_content">

<!-- Products -->

					<div class="products_iso">
						<div class="row">
							<div class="col">

								<!-- Product Sorting -->

								<div class="product_sorting_container product_sorting_container_top">
									<ul class="product_sorting">
										<li>
											<span class="type_sorting_text">Opsi Sortir</span>
											<i class="fa fa-angle-down"></i>
											<ul class="sorting_type">
												<li class="type_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'><span>Sortir</span></li>
												<li class="type_sorting_btn" data-isotope-option='{ "sortBy": "price" }'><span>Berdasarkan Harga</span></li>
												<li class="type_sorting_btn" data-isotope-option='{ "sortBy": "name" }'><span>Berdasarkan Nama</span></li>
											</ul>
										</li>
										<li>
											<span>Tampil</span>
											<span class="num_sorting_text">6</span>
											<i class="fa fa-angle-down"></i>
											<ul class="sorting_num">
												<li class="num_sorting_btn"><span>6</span></li>
												<li class="num_sorting_btn"><span>12</span></li>
												<li class="num_sorting_btn"><span>24</span></li>
											</ul>
										</li>
									</ul>
									<div class="pages d-flex flex-row align-items-center">
										<!-- <div class="page_current"> -->
											<!-- <span>1</span> -->
											<ul class="page_selection">
												<!-- <li><a id="pagination" onclick="paginate()"href="#">1</a></li> -->
												<li><a href="#">2</a></li>
												<li><a href="#">3</a></li>
											</ul>
										<!-- </div> -->
										<!-- <div class="page_total"><span>of</span> 3</div> -->
										

								</div>

								<!-- Product Grid -->

								<div  style="display: inline-block;" class="product-grid" >
									
									
									<!-- <div   id="ProductName"> -->
										@include('frontend.category.produklist')
									<!-- </div> -->

									<div id="id"></div>
									
								</div>


								<!-- Product Sorting -->

								<!-- <div class="product_sorting_container product_sorting_container_bottom clearfix"> -->
								<!-- 	<ul class="product_sorting">
										<li>
											<span>Show:</span>
											<span class="num_sorting_text">04</span>
											<i class="fa fa-angle-down"></i>
											<ul class="sorting_num">
												<li class="num_sorting_btn"><span>01</span></li>
												<li class="num_sorting_btn"><span>02</span></li>
												<li class=D"num_sorting_btn"><span>03</span></li>
												<li class="num_sorting_btn"><span>04</span></li>
											</ul>
										</li>
									</ul> -->
									<span class="showing_results">Showing 1–10 of {{ \DB::table('products')->count() }} results</span>
							{{ $data->links()}}
							</div>

						</div>

					</div>
				</div>

			</div>

		</div>


	</div>

	<!-- Benefit -->

	<!-- <div class="benefit">
		<div class="container">
			<div class="row benefit_row">
				<div class="col-lg-3 benefit_col">
					<div class="benefit_item d-flex flex-row align-items-center">
						<div class="benefit_icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
						<div class="benefit_content">
							<h6>free shipping</h6>
							<p>Suffered Alteration in Some Form</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 benefit_col">
					<div class="benefit_item d-flex flex-row align-items-center">
						<div class="benefit_icon"><i class="fa fa-money" aria-hidden="true"></i></div>
						<div class="benefit_content">
							<h6>cach on delivery</h6>
							<p>The Internet Tend To Repeat</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 benefit_col">
					<div class="benefit_item d-flex flex-row align-items-center">
						<div class="benefit_icon"><i class="fa fa-undo" aria-hidden="true"></i></div>
						<div class="benefit_content">
							<h6>45 days return</h6>
							<p>Making it Look Like Readable</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 benefit_col">
					<div class="benefit_item d-flex flex-row align-items-center">
						<div class="benefit_icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
						<div class="benefit_content">
							<h6>opening all week</h6>
							<p>8AM - 09PM</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
 -->
	<!-- Newsletter -->
<!-- 
	<div class="newsletter">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="newsletter_text d-flex flex-column justify-content-center align-items-lg-start align-items-md-center text-center">
						<h4>Newsletter</h4>
						<p>Subscribe to our newsletter</p>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
						<input id="newsletter_email" type="email" placeholder="Your email" required="required" data-error="Valid email is required.">
						<button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300" value="Submit">subscribe</button>
					</div>
				</div>
			</div>
		</div>
	</div> -->

	<!-- Footer -->

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
						<div class="cr">©2018 All Rights Reserverd. Template by <a href="#">Colorlib</a></div>
					</div>
				</div>
			</div>
		</div>
	</footer>

</div>

<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>  -->
<!-- <script src="sweetalert2.all.min.js"></script> -->
<script src="template/js/jquery-3.2.1.min.js"></script>
<script src="template/styles/bootstrap4/popper.js"></script>
<script src="template/styles/bootstrap4/bootstrap.min.js"></script>
<script src="template/plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="template/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="template/plugins/easing/easing.js"></script>
<script src="template/plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="template/js/categories_custom.js"></script>

<!-- nyoba ajax -->
 <html>

 <script type="text/javascript" src="template/js/jquery-3.2.1.min.js"> </script>
 <script type="text/javascript">
 

//------ add to cart button -------//
$(document).ready(function()
{


	$(".addCart").click(function() {
		var id = $(this).attr('id');
		// var qty = $(this).attr('ProductName');
		// var size = $(this).attr('size');
		// var color = $(this).attr('color');
		// var price = $(this).attr('price');

		var csrf_token = $('meta[name="csrf-token"]').attr('content');
		console.log(id);
		$.ajax({
			type: "POST",
			url : "/cart-data",
			data : {id , '_token' : csrf_token},
			success : function(data){
				console.log(data);
				$(".checkout_items").html(data.data);
				// $(".checkout_items").html();
			swal({
				title : 'Berhasil ditambahkan ke keranjang',
				type: 'success',
 				showConfirmButton: false,
  				timer: 1500
			})
		},
		});
		
	});
		
		
});

 $(document).ready(function() {          
 		var csrf_token = $('meta[name="csrf-token"]').attr('content');
      $.ajax({    //create an ajax request to display.php

        type: "GET",
        url: "/category-front/productcategory",             
        dataType: "html",   //expect html to be returned                
        success: function(response){                
        // console.log(response);    
            $("#CategoryName").html(response); 
            //alert(response);
        }
	});
    $(function() {
    $('body').on('click', '.pagination a', function(e) {
        e.preventDefault();

 

        var url = $(this).attr('href');  
        getArticles(url);
        console.log(url);
        window.history.pushState("", "", url);
    });

    function getArticles(url) {
        // console.log('hai kevin');
        $.ajax({
            url : url  
        }).done(function (data) {
        	$('#ProductName').html('');
            $('#ProductName').html(data);  
            location.reload();
        }).fail(function () {
            alert('Articles could not be loaded.');
        });
    }
});

});

  // $(document).ready(function() {          

  //     $.ajax({    //create an ajax request to display.php
  //       type: "GET",
  //       url: "/category-front/productlist",             
  //       dataType: "html",   //expect html to be returned                
  //       success: function(response){                
  //       // console.log(response);    
  //           $("#ProductName").html(response); 
  //           //alert(response);
  //       }
// newurl = "{{ url('/asd/asd') }}" + '/' + ... +
// $("ProductName").ajax.url(url na naon).load();
//     });

// });

//  $(document).ready(function() {          
 	


//       $.ajax({    //create an ajax request to display.php
//         type: "GET",
//         url: "/category-front/productlist/?page=1",
              
//         dataType: "html",   //expect html to be returned                
//         success: function(response){                
//         // console.log(response);    

//         	var newurl = "{{ url('/category-front/productlist/?page=')}}" + '2';
//         	// var url = $('#pagination').attr('action')+'?page='+page;
//         	$("#ProductName").html(''); 
//             $("#pagination").load(newurl);
//              // $("#ProductName").html(response); 
//             //alert(response);
//         }


//     });

// });






</script>





</body>

</html>
