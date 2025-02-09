@extends('Christopher_IT_Accessories.layout')
@section('content')

<main>
    <section class="hero-section hero-section-full-height d-flex justify-content-center align-items-center" >
        <div class="section-overlay"></div>

        <div class="container">
            <div class="row">

                <div class="col-lg-7 col-12 text-center mx-auto">
                    <h1 class="cd-headline rotate-1 text-white mb-4 pb-2">
                        <span>Shop</span>
                        <span class="cd-words-wrapper">
                            <b class="is-visible">Laptop Accessories</b>
                            <b>Phone Accessories</b>
                            <b>Tablet Accessories</b>
                        </span>
                        <span style="font-size: 20px">at Christopher🐾</span>
                    </h1>

                </div>

            </div>
        </div>

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#ffffff" fill-opacity="1"
                d="M0,224L40,229.3C80,235,160,245,240,250.7C320,256,400,256,480,240C560,224,640,192,720,176C800,160,880,160,960,138.7C1040,117,1120,75,1200,80C1280,85,1360,139,1400,165.3L1440,192L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z">
            </path>
        </svg>
    </section>
</main>

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="/images/register.png" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>Laptop<br>Accessories</h3>
                        <a href="{{route('product')}}" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /shop -->

            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="/images/register2.jpg" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>Network<br>Accessories</h3>
                        <a href="{{route('product')}}" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /shop -->

            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="/images/register3.png" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>Phone<br>Accessories</h3>
                        <a href="{{route('product')}}" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            {{-- @endforeach --}}
            <!-- /shop -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!--New Arrival SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">


            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">New Arrival Products</h3>

                    <div class="section-nav">
                        <ul class="section-tab-nav tab-nav">
                            <li class="active">
                                <a data-toggle="tab" href="#tab1">
                                    <i class="fa fa-laptop" aria-hidden="true"></i> Laptops'
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab2">
                                    <i class="fa fa-mobile" aria-hidden="true"></i> Smartphones'
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab3">
                                    <i class="fa fa-signal" aria-hidden="true"></i> Networks'
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab4">
                                    <i class="fa fa-tablet" aria-hidden="true"></i> Tablets'
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
            <!-- /section title -->

            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <!-- tab -->
                        <div id="tab1" class="tab-pane active">
                            <div class="products-slick" data-nav="#slick-nav-1">

                                @foreach ($products as $p)
                            {{-- for token --}}
                                    @csrf


                                <div class="product" style="padding: 20px; margin-bottom: 20px; border-radius: 10px; background-color: #f9f9f9;">
                                    <div class="product-img" style="text-align: center;">
                                        <img src="/images/product/{{$p['img_name']}}" alt="" style="height: 250px; width: 300px;">
                                    </div>
                                    <div class="product-body" style="text-align: center; margin-top: 15px;">
                                        <p class="product-category" style="font-size: 14px; color: #999;">Brand</p>
                                        <h3 class="product-name" style="font-size: 18px; font-weight: bold;">{{$p['brand']}}</h3>
                                        <h4 class="product-price" style="color: #ff6f61;">Price: {{$p['price']}}</h4>
                                    </div>
                                    <div class="product-btns" style="text-align: center; margin-top: 10px;">
                                        <a href="{{route('detail', $p['id'])}}" class="quick-view" style="color: #333; font-size: 14px; text-decoration: none;">
                                            <i class="fa fa-eye" style="color: #ff6f61;"></i> Quick View
                                        </a>
                                    </div>
                                    <div class="add-to-cart" style="text-align: center; margin-top: 15px;">
                                        <a href="{{route('detail', $p['id'])}}" class="add-to-cart-btn" style="display: inline-block; background-color: #ff6f61; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; text-transform: uppercase; font-weight: bold;">
                                            Product Details
                                        </a>
                                    </div>
                                </div>


                                @endforeach

                                <div class="product">
                                    <div class="product-img">
                                        <img src="/images/product/{{$p['img_name']}}" alt="" style="height: 250px">

                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">Brand</p>
                                        <h3 class="product-name"> {{$p['brand']}}</h3>
                                        <h4 class="product-price"> Price: {{$p['price']}}</h4>

                                        <div class="product-btns">

                                            <button class="quick-view"> <a href="{{route('detail',$p['id'])}}"><i class="fa fa-eye" style="color: black"></i></a><span class="tooltipp">quick view</span></button>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <button class="add-to-cart-btn"><a href="{{route('detail',$p['id'])}}" class="btn">Product Details</a></button>
                                    </div>
                                </div>

                            </div>
                            <div id="slick-nav-1" class="products-slick-nav"></div>
                        </div>
                        <!-- /tab -->
                    </div>
                </div>
            </div>

            <!-- Products tab & slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- HOT DEAL SECTION -->
<div id="hot-deal" class="section" style="background-color: #f8f9fa; padding: 40px 0; text-align: center;">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="hot-deal" style="padding: 20px; border-radius: 10px; background-color: #fff; box-shadow: 0px 5px 10px rgba(0,0,0,0.1);">
                    <ul class="hot-deal-countdown" style="list-style: none; padding: 0; margin-bottom: 20px; display: flex; justify-content: center; gap: 20px;">
                        <li style="text-align: center;">
                            <div style="padding: 10px;">
                                <h3 style="margin: 0; font-size: 36px; color: #ff6f61;">02</h3>
                                <span style="font-size: 14px; color: #999;">Days</span>
                            </div>
                        </li>
                        <li style="text-align: center;">
                            <div style="padding: 10px;">
                                <h3 style="margin: 0; font-size: 36px; color: #ff6f61;">10</h3>
                                <span style="font-size: 14px; color: #999;">Hours</span>
                            </div>
                        </li>
                        <li style="text-align: center;">
                            <div style="padding: 10px;">
                                <h3 style="margin: 0; font-size: 36px; color: #ff6f61;">34</h3>
                                <span style="font-size: 14px; color: #999;">Mins</span>
                            </div>
                        </li>
                        <li style="text-align: center;">
                            <div style="padding: 10px;">
                                <h3 style="margin: 0; font-size: 36px; color: #ff6f61;">60</h3>
                                <span style="font-size: 14px; color: #999;">Secs</span>
                            </div>
                        </li>
                    </ul>
                    <h2 class="text-uppercase" style="font-size: 32px; color: #333; margin-bottom: 10px;">Hot Deal This Week</h2>
                    <p style="font-size: 18px; color: #555;">New Collection Up to 50% OFF</p>
                    <a class="primary-btn cta-btn" href="{{route('product')}}" style="background-color: #ff6f61; color: white; padding: 12px 30px; text-decoration: none; font-weight: bold; border-radius: 5px; text-transform: uppercase;">
                        Shop Now
                    </a>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>

<!-- /HOT DEAL SECTION -->


<!-- Trend SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Trend Products</h3>
                    <div class="section-nav">
                        <ul class="section-tab-nav tab-nav">
                            <li class="active"><a data-toggle="tab" href="#tab2">Laptops'</a></li>
                            <li><a data-toggle="tab" href="#tab2">Smartphones'</a></li>
                            <li><a data-toggle="tab" href="#tab2">Network's</a></li>
                            <li><a data-toggle="tab" href="#tab2">Tablets's</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /section title -->

            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">

                    <div class="products-tabs">

                        <!-- tab -->
                        <div id="tab2" class="tab-pane fade in active">

                            <div class="products-slick" data-nav="#slick-nav-2">

                                @foreach ($products as $p)
                            {{-- for token --}}
                                    @csrf

                                <!-- product -->
                                <div class="product" style="background-color: #f9f9f9; border-radius: 10px; padding: 15px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); transition: transform 0.3s ease; margin-bottom: 20px;">
                                    <div class="product-img" style="text-align: center;">
                                        <img src="/images/product/{{$p['img_name']}}" alt="Product Image" style="max-width: 100%; height: 220px; object-fit: cover; border-radius: 10px;">
                                    </div>
                                    <div class="product-body" style="padding: 15px;">
                                        <p class="product-category" style="font-size: 12px; color: #999; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 5px;">Brand</p>
                                        <h3 class="product-name" style="font-size: 18px; font-weight: 700; color: #333; margin-bottom: 10px;">{{$p['brand']}}</h3>
                                        <h4 class="product-price" style="font-size: 16px; font-weight: 600; color: #e74c3c; margin-bottom: 10px;">Price: {{$p['price']}}</h4>
                                        <div class="product-rating" style="margin-bottom: 15px; color: #ffd700;">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star" style="color: #ddd;"></i> <!-- Empty star -->
                                        </div>
                                        <div class="product-btns" >
                                            {{-- <a href="{{route('detail',$p['id'])}}" class="btn" style="background-color: #e74c3c; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">Quick View</a> --}}
                                            <a href="{{route('detail',$p['id'])}}" class="btn" style="background-color: #34495e; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">Quick View</a>
                                        </div>
                                    </div>
                                </div>



                                @endforeach
                            </div>

                            <div id="slick-nav-2" class="products-slick-nav"></div>
                        </div>
                        <!-- /tab -->

                    </div>
                </div>
            </div>

            <!-- /Products tab & slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!--Top Sellings SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-4 col-xs-6">
                <div class="section-title">
                    <h4 class="title">Top selling</h4>
                    <div class="section-nav">
                        <div id="slick-nav-4" class="products-slick-nav"></div>
                    </div>
                </div>

                <div class="products-widget-slick" data-nav="#slick-nav-4">
                    <div>
                        <!-- product widget -->
                        <div class="product-widget">
                            <div class="product-img">
                                <img src="/images/product/14.png" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">Wiki</p>
                                <h3 class="product-name"><a href="{{route('detail', '13')}}">Airpod </a></h3>
                                <h4 class="product-price">40000</h4>
                            </div>
                        </div>
                        <!-- /product widget -->

                        <!-- product widget -->
                        <div class="product-widget">
                            <div class="product-img">
                                <img src="/images/product/1.jpg" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">Logitech</p>
                                <h3 class="product-name"><a href="{{route('detail', '1')}}">Mouse </a></h3>
                                <h4 class="product-price">300000</h4>
                            </div>
                        </div>
                        <!-- /product widget -->

                        <!-- product widget -->
                        <div class="product-widget">
                            <div class="product-img">
                                <img src="/images/product/5.jpg" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">Melia</p>
                                <h3 class="product-name"><a href="{{route('detail', '5')}}">Airpod </a></h3>
                                <h4 class="product-price">45000</h4>
                            </div>
                        </div>
                        <!-- product widget -->
                    </div>

                    <div>
                        <!-- product widget -->
                        <div class="product-widget">
                            <div class="product-img">
                                <img src="/images/product/8.jpg" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">Stepha</p>
                                <h3 class="product-name"><a href="{{route('detail', '13')}}">Touch Pen </a></h3>
                                <h4 class="product-price">100000</h4>
                            </div>
                        </div>
                        <!-- /product widget -->

                        <!-- product widget -->
                        <div class="product-widget">
                            <div class="product-img">
                                <img src="/images/product/10.jpg" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">Dellia</p>
                                <h3 class="product-name"><a href="{{route('detail', '10')}}">USB Stick </a></h3>
                                <h4 class="product-price">45000</h4>
                            </div>
                        </div>
                        <!-- /product widget -->

                        <!-- product widget -->
                        <div class="product-widget">
                            <div class="product-img">
                                <img src="/images/product/21.png" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">Jeki</p>
                                <h3 class="product-name"><a href="{{route('detail', '16')}}">Phone Adapter </a></h3>
                                <h4 class="product-price">25000</h4>
                            </div>
                        </div>
                        <!-- product widget -->
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-xs-6">
                <div class="section-title">
                    <h4 class="title">Top selling</h4>
                    <div class="section-nav">
                        <div id="slick-nav-4" class="products-slick-nav"></div>
                    </div>
                </div>

                <div class="products-widget-slick" data-nav="#slick-nav-4">
                    <div>
                        <!-- product widget -->
                        <div class="product-widget">
                            <div class="product-img">
                                <img src="/images/product/11.jpg" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">Jook</p>
                                <h3 class="product-name"><a href="{{route('detail', '15')}}">Phone Adapter </a></h3>
                                <h4 class="product-price">20000</h4>
                            </div>
                        </div>
                        <!-- /product widget -->

                        <!-- product widget -->
                        <div class="product-widget">
                            <div class="product-img">
                                <img src="/images/product/8.jpg" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">Stepha</p>
                                <h3 class="product-name"><a href="{{route('detail', '13')}}">Touch Pen </a></h3>
                                <h4 class="product-price">100000</h4>
                            </div>
                        </div>
                        <!-- /product widget -->

                        <!-- product widget -->
                        <div class="product-widget">
                            <div class="product-img">
                                <img src="/images/product/10.jpg" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">Dellia</p>
                                <h3 class="product-name"><a href="{{route('detail', '10')}}">USB Stick </a></h3>
                                <h4 class="product-price">45000</h4>
                            </div>
                        </div>
                        <!-- product widget -->
                    </div>

                    <div>
                        <!-- product widget -->
                        <div class="product-widget">
                            <div class="product-img">
                                <img src="/images/product/21.png" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">Jeki</p>
                                <h3 class="product-name"><a href="{{route('detail', '16')}}">Phone Adapter </a></h3>
                                <h4 class="product-price">25000</h4>
                            </div>
                        </div>
                        <!-- /product widget -->

                        <!-- product widget -->
                        <div class="product-widget">
                            <div class="product-img">
                                <img src="/images/product/14.png" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">Wiki</p>
                                <h3 class="product-name"><a href="{{route('detail', '13')}}">Airpod </a></h3>
                                <h4 class="product-price">40000</h4>
                            </div>
                        </div>
                        <!-- /product widget -->

                        <!-- product widget -->
                        <div class="product-widget">
                            <div class="product-img">
                                <img src="/images/product/12.png" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">Snia</p>
                                <h3 class="product-name"><a href="{{route('detail', '11')}}">Power Band </a></h3>
                                <h4 class="product-price">80000</h4>
                            </div>
                        </div>
                        <!-- product widget -->
                    </div>
                </div>
            </div>

            {{-- <div class="clearfix visible-sm visible-xs"></div> --}}

            <div class="col-md-4 col-xs-6">
                <div class="section-title">
                    <h4 class="title">Top selling</h4>
                    <div class="section-nav">
                        <div id="slick-nav-4" class="products-slick-nav"></div>
                    </div>
                </div>

                <div class="products-widget-slick" data-nav="#slick-nav-4">
                    <div>
                        <!-- product widget -->
                        <div class="product-widget">
                            <div class="product-img">
                                <img src="/images/product/14.png" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">Wiki</p>
                                <h3 class="product-name"><a href="{{route('detail', '13')}}">Airpod </a></h3>
                                <h4 class="product-price">40000</h4>
                            </div>
                        </div>
                        <!-- /product widget -->

                        <!-- product widget -->
                        <div class="product-widget">
                            <div class="product-img">
                                <img src="/images/product/1.jpg" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">Logitech</p>
                                <h3 class="product-name"><a href="{{route('detail', '1')}}">Mouse </a></h3>
                                <h4 class="product-price">300000</h4>
                            </div>
                        </div>
                        <!-- /product widget -->

                        <!-- product widget -->
                        <div class="product-widget">
                            <div class="product-img">
                                <img src="/images/product/5.jpg" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">Melia</p>
                                <h3 class="product-name"><a href="{{route('detail', '5')}}">Airpod </a></h3>
                                <h4 class="product-price">45000</h4>
                            </div>
                        </div>
                        <!-- product widget -->
                    </div>

                    <div>
                        <!-- product widget -->
                        <div class="product-widget">
                            <div class="product-img">
                                <img src="/images/product/8.jpg" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">Stepha</p>
                                <h3 class="product-name"><a href="{{route('detail', '13')}}">Touch Pen </a></h3>
                                <h4 class="product-price">100000</h4>
                            </div>
                        </div>
                        <!-- /product widget -->

                        <!-- product widget -->
                        <div class="product-widget">
                            <div class="product-img">
                                <img src="/images/product/10.jpg" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">Dellia</p>
                                <h3 class="product-name"><a href="{{route('detail', '10')}}">USB Stick </a></h3>
                                <h4 class="product-price">45000</h4>
                            </div>
                        </div>
                        <!-- /product widget -->

                        <!-- product widget -->
                        <div class="product-widget">
                            <div class="product-img">
                                <img src="/images/product/21.png" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">Jeki</p>
                                <h3 class="product-name"><a href="{{route('detail', '16')}}">Phone Adapter </a></h3>
                                <h4 class="product-price">25000</h4>
                            </div>
                        </div>
                        <!-- product widget -->
                    </div>
                </div>
            </div>

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<section class="partners-section">
    <div class="container">
        <div class="row justify-content-center align-items-center">

            <div class="col-lg-12 col-12">
                <h4 class="partners-section-title justify-content-center align-items-center">Trusted by companies</h4>
            </div>

            <div class="col-lg-2 col-md-4 col-6">
                <img src="images/partners/toprak-leasing.svg" class="partners-image img-fluid">
            </div>

            <div class="col-lg-2 col-md-4 col-6">
                <img src="images/partners/glorix.svg" class="partners-image img-fluid">
            </div>

            <div class="col-lg-2 col-md-4 col-6">
                <img src="images/partners/woocommerce.svg" class="partners-image img-fluid">
            </div>

            <div class="col-lg-2 col-md-4 col-6">
                <img src="images/partners/rolf-leasing.svg" class="partners-image img-fluid">
            </div>

            <div class="col-lg-2 col-md-4 col-6">
                <img src="images/partners/unilabs.svg" class="partners-image img-fluid">
            </div>

        </div>
    </div>
</section>

@endsection


