@extends('public.main')

@section('main')
<div class="wrap-header-cart js-panel-cart">
    <div class="s-full js-hide-cart"></div>

    <div class="header-cart flex-col-l p-l-65 p-r-25">
        <div class="header-cart-title flex-w flex-sb-m p-b-8">
            <span class="mtext-103 cl2">
                Your Cart
            </span>

            <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                <i class="zmdi zmdi-close"></i>
            </div>
        </div>
        
        <div class="header-cart-content flex-w js-pscroll">
            <ul class="header-cart-wrapitem w-full">
                <li class="header-cart-item flex-w flex-t m-b-12">
                    <div class="header-cart-item-img">
                        <img src="assets/images/item-cart-01.jpg" alt="IMG">
                    </div>

                    <div class="header-cart-item-txt p-t-8">
                        <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                            White Shirt Pleat
                        </a>

                        <span class="header-cart-item-info">
                            1 x $19.00
                        </span>
                    </div>
                </li>

                <li class="header-cart-item flex-w flex-t m-b-12">
                    <div class="header-cart-item-img">
                        <img src="assets/images/item-cart-02.jpg" alt="IMG">
                    </div>

                    <div class="header-cart-item-txt p-t-8">
                        <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                            Converse All Star
                        </a>

                        <span class="header-cart-item-info">
                            1 x $39.00
                        </span>
                    </div>
                </li>

                <li class="header-cart-item flex-w flex-t m-b-12">
                    <div class="header-cart-item-img">
                        <img src="assets/images/item-cart-03.jpg" alt="IMG">
                    </div>

                    <div class="header-cart-item-txt p-t-8">
                        <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                            Nixon Porter Leather
                        </a>

                        <span class="header-cart-item-info">
                            1 x $17.00
                        </span>
                    </div>
                </li>
            </ul>
            
            <div class="w-full">
                <div class="header-cart-total w-full p-tb-40">
                    Total: $75.00
                </div>

                <div class="header-cart-buttons flex-w w-full">
                    <a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                        View Cart
                    </a>

                    <a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                        Check Out
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

    

<!-- Slider -->
<section class="section-slide">
    <div class="wrap-slick1">
        <div class="slick1">
            @foreach ($banners as $banner)
                
            <div class="item-slick1" style="background-image: url('{{ asset('uploads/' . $banner->image) }}');">
                <div class="container h-full">
                    <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                        <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                            <span class="ltext-101 cl2 respon2">
                                {{ $banner->title }}
                            </span>
                        </div>
                            
                        <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                            <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                {{ $banner->description }}
                            </h2>
                        </div>
                            
                        <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                            <a href="{{ route('public.shop') }}" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                Shop Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
            

            
        </div>
    </div>
</section>


<!-- Banner -->
<div class="sec-banner bg0 p-t-80 p-b-50">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
                <!-- Block1 -->
                <div class="block1 wrap-pic-w">
                    <img src="assets/images/banner-01.jpg" alt="IMG-BANNER">

                    <a href="{{ route('public.shop') }}" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                        <div class="block1-txt-child1 flex-col-l">
                            <span class="block1-name ltext-102 trans-04 p-b-8">
                                Women
                            </span>

                            <span class="block1-info stext-102 trans-04">
                                Spring 2024
                            </span>
                        </div>

                        <div class="block1-txt-child2 p-b-4 trans-05">
                            <div class="block1-link stext-101 cl0 trans-09">
                                Shop Now
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
                <!-- Block1 -->
                <div class="block1 wrap-pic-w">
                    <img src="assets/images/banner-02.jpg" alt="IMG-BANNER">

                    <a href="{{ route('public.shop') }}" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                        <div class="block1-txt-child1 flex-col-l">
                            <span class="block1-name ltext-102 trans-04 p-b-8">
                                Men
                            </span>

                            <span class="block1-info stext-102 trans-04">
                                Spring 2024
                            </span>
                        </div>

                        <div class="block1-txt-child2 p-b-4 trans-05">
                            <div class="block1-link stext-101 cl0 trans-09">
                                Shop Now
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
                <!-- Block1 -->
                <div class="block1 wrap-pic-w">
                    <img src="assets/images/banner-03.jpg" alt="IMG-BANNER">

                    <a href="{{ route('public.shop') }}" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                        <div class="block1-txt-child1 flex-col-l">
                            <span class="block1-name ltext-102 trans-04 p-b-8">
                                Accessories
                            </span>

                            <span class="block1-info stext-102 trans-04">
                                New Trend
                            </span>
                        </div>

                        <div class="block1-txt-child2 p-b-4 trans-05">
                            <div class="block1-link stext-101 cl0 trans-09">
                                Shop Now
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            

        </div>
    </div>
</div>


<!-- Product -->
<section class="bg0 p-t-23 p-b-140">
    <div class="container">
        <div class="p-b-10">
            <h3 class="ltext-103 cl5">
                New Products
            </h3>
        </div>

        <div class="flex-w flex-sb-m p-b-52">

            <div class="dis-none panel-search w-full p-t-10 p-b-15">
                <div class="bor8 dis-flex p-l-15">
                    <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                        <i class="zmdi zmdi-search"></i>
                    </button>

                    <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
                </div>	
            </div>

            
            
        </div>

        <div class="row isotope-grid">

            @foreach ($products_home as $product)
            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                
                <div class="block2">

                    
                    <a href="{{ route('public.product', $product->id) }}" class="block2-pic hov-img0 ">
                        <img src="uploads/{{$product->image}}" alt="IMG-PRODUCT">

                        
                    </a>

                    <div class="block2-txt flex-w flex-t p-t-14">
                        <div class="block2-txt-child1 flex-col-l" style="display: flex">
                           @if ($product->sale_price > 0)
                           <a href="{{ route('public.product', $product->id) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6" >
                            {{$product->name}} <span style="color: white; background-color: red; padding: 5px;border-radius: 10px">-{{ $product->sale_price }}%</span>
                           </a>
                           @else
                           <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                {{$product->name}}
                           </a>
                           @endif


                            @if ($product->sale_price > 0 )
                                <div style="display: flex">
                                    <span class="stext-105 cl3" >
                                        {{number_format( $product->price - (($product->sale_price * $product->price)/100) )}}đ 
                                    </span>
    
                                    <span class="stext-105 cl3" style="text-decoration: line-through; margin-left: 15px" >
                                        {{number_format($product->price)}}đ 
                                    </span>
                                </div>
                                @else
                                <span class="stext-105 cl3">
                                    {{number_format($product->price)}}đ
                                </span>
                            @endif
                            
                        </div>

                        <div class="block2-txt-child2 flex-r p-t-3">
                            <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                <img class="icon-heart1 dis-block trans-04" src="assets/images/icons/icon-heart-01.png" alt="ICON">
                                <img class="icon-heart2 dis-block trans-04 ab-t-l" src="assets/images/icons/icon-heart-02.png" alt="ICON">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

        <!-- Load more -->
        <div class="flex-c-m flex-w w-full p-t-45">
            <a href="{{ route('public.shop') }}" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
                View all
            </a>
        </div>
    </div>
</section>




@endsection