@foreach ($data as $key => $value)
<div  class="product-item {{$value->category->CategoryName}}" style="padding-left: 4px; display: inline-block;">
                                        <div  class="product discount product_filter">
                                            <div  class="product_image">
                                                <a href="{{url('/product-front/'.$value->id.'')}}">
                                                <img  src="{{$value->photo}}" alt="">
                                                </a>
                                            </div>
                                            <div class="favorite "></div>
                                            <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span></span></div>
                                            <div class="product_info">
                                                <h6 class="product_name" ><a href="single.html">{{$value->ProductName}}</a></h6>
                                                <div class="product_price"> Rp. {{$value->Price}}</div>
                                            </div>
                                        </div>
                                        <div class="red_button add_to_cart_button "  ><a id="{{ $value->id }}" ProductName="{{$value->ProductName}}" size= "{{$value->Size}}" color="{{$value->Color}}" price="{{$value->Price}}"class="addCart" href="javascript:void(0)">add to cart</a></div>
                                    </div>

@endforeach