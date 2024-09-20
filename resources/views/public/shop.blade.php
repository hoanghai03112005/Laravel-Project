@extends('public.main')

@section('main')
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('assets/images/bg-02.jpg');height: 150px;">
    <h2 class="ltext-105 cl0 txt-center">
        Shops
    </h2>
</section>	
<section class="bg0 p-t-23 p-b-140" style="margin-top: 50px">

    <div class="container">
        <div class="flex-w flex-sb-m p-b-52">
            <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                <a href="{{ route('public.shop') }}" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                    All product
                </a>
                @foreach ($cats_home as $cat)
                <a href="{{ route('public.shop', $cat->id) }}" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter="*">
                    {{ $cat->name }} ({{ $cat->products->count() }})
                </a>
                @endforeach
            </div>

            <div class="flex-w flex-c-m m-tb-10">
                <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
                    <i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
                    <i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                     Filter
                </div>

                <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
                    <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
                    <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                    Search
                </div>
            </div>

            {{-- Search --}}
            <div class="dis-none panel-search w-full p-t-10 p-b-15">
                <form method="GET" class="bor8 dis-flex p-l-15" action="">
                    <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                        <i class="zmdi zmdi-search"></i>
                    </button>

                    <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="keyword_down" placeholder="Search">
                </form>	
            </div>

            <!-- Filter -->
            <div class="dis-none panel-filter w-full p-t-10">
                <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
                    <div class="filter-col1 p-r-15 p-b-27">
                        <div class="mtext-102 cl2 p-b-15">
                            Sort By
                        </div>
                       
                        <form action="" method="GET" id="filterForm">
                            <select name="order" class="form-control" onchange="document.getElementById('filterForm').submit();">
                                <option value="" >Sắp xếp mặc định</option>
                                <option value="id-ASC" {{ request('order') == 'id-ASC' ? 'selected' : '' }}>Tăng dần theo Id</option>
                                <option value="id-DESC"> {{ request('order') == 'id-DESC' ? 'selected' : '' }}Giảm dần theo Id</option>
                                <option value="price-ASC" {{ request('order') == 'price-ASC' ? 'selected' : '' }}>Tăng dần theo price</option>
                                <option value="price-DESC" {{ request('order') == 'price-DESC' ? 'selected' : '' }}>Giảm dần theo price</option>
                                <option value="name-ASC" {{ request('order') == 'name-ASC' ? 'selected' : '' }}>Tăng dần theo name</option>
                                <option value="name-DESC" {{ request('order') == 'name-DESC' ? 'selected' : '' }}>Giảm dần theo name</option>
                                <option value="created_at-ASC" {{ request('order') == 'created_at-ASC' ? 'selected' : '' }}>Tăng dần theo ngày tạo</option>
                                <option value="created_at-DESC" {{ request('order') == 'created_at-DESC' ? 'selected' : '' }}>Giảm dần theo ngày tạo</option>
                            </select>
                            
                        </form>
                       
                        
                    </div>

                    <div class="filter-col2 p-r-15 p-b-27">
                        <div class="mtext-102 cl2 p-b-15">
                            Price
                        </div>

                        
                        <form action="" method="GET" id="filterFormPrice">
                            <select name="order_price" class="form-control" onchange="document.getElementById('filterFormPrice').submit();">
                                <option value="" >All</option>
                                <option value="0-100000"> {{ request('order_price') == '0-100000' ? 'selected' : '' }}0-100.000đ</option>
                                <option value="100000-300000" {{ request('order_price') == '100000-300000' ? 'selected' : '' }}>100.000-300.000đ</option>
                                <option value="300000-500000" {{ request('order_price') == '300000-500000' ? 'selected' : '' }}>300.000-500.000đ</option>
                                <option value="500000-1000000" {{ request('order_price') == '500000-1000000' ? 'selected' : '' }}>500.000-1.000.000đ</option>
                                <option value="1000000" {{ request('order_price') == '1000000' ? 'selected' : '' }}>1.000.000đ +</option>
                                
                            </select>
                            
                        </form>
                    </div>

                    <div class="filter-col3 p-r-15 p-b-27">
                        <div class="mtext-102 cl2 p-b-15">
                            Color
                        </div>

                        <ul>
                            <li class="p-b-6">
                                <span class="fs-15 lh-12 m-r-6" style="color: #222;">
                                    <i class="zmdi zmdi-circle"></i>
                                </span>

                                <a href="#" class="filter-link stext-106 trans-04">
                                    Black
                                </a>
                            </li>

                            <li class="p-b-6">
                                <span class="fs-15 lh-12 m-r-6" style="color: #4272d7;">
                                    <i class="zmdi zmdi-circle"></i>
                                </span>

                                <a href="#" class="filter-link stext-106 trans-04 filter-link-active">
                                    Blue
                                </a>
                            </li>

                            <li class="p-b-6">
                                <span class="fs-15 lh-12 m-r-6" style="color: #b3b3b3;">
                                    <i class="zmdi zmdi-circle"></i>
                                </span>

                                <a href="#" class="filter-link stext-106 trans-04">
                                    Grey
                                </a>
                            </li>

                            <li class="p-b-6">
                                <span class="fs-15 lh-12 m-r-6" style="color: #00ad5f;">
                                    <i class="zmdi zmdi-circle"></i>
                                </span>

                                <a href="#" class="filter-link stext-106 trans-04">
                                    Green
                                </a>
                            </li>

                            <li class="p-b-6">
                                <span class="fs-15 lh-12 m-r-6" style="color: #fa4251;">
                                    <i class="zmdi zmdi-circle"></i>
                                </span>

                                <a href="#" class="filter-link stext-106 trans-04">
                                    Red
                                </a>
                            </li>

                            <li class="p-b-6">
                                <span class="fs-15 lh-12 m-r-6" style="color: #aaa;">
                                    <i class="zmdi zmdi-circle-o"></i>
                                </span>

                                <a href="#" class="filter-link stext-106 trans-04">
                                    White
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="filter-col4 p-b-27">
                        <div class="mtext-102 cl2 p-b-15">
                            Tags
                        </div>

                        <div class="flex-w p-t-4 m-r--5">
                            <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                Fashion
                            </a>

                            <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                Lifestyle
                            </a>

                            <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                Denim
                            </a>

                            <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                Streetstyle
                            </a>

                            <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                Crafts
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
                    
                
            
        </div>
    </div>

    <div class="container">
        


        <div class="row isotope-grid">
            @foreach($products as $product)
            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                
                <div class="block2">
                    <a href="{{ route('public.product', $product->id) }}" class="block2-pic hov-img0">
                        <img src="uploads/{{ $product->image }}" alt="IMG-PRODUCT">   
                    </a>

                    <div class="block2-txt flex-w flex-t p-t-14">
                        <div class="block2-txt-child1 flex-col-l ">
                            @if ($product->sale_price > 0)
                           <a href="{{ route('public.product', $product->id) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6" >
                            {{$product->name}} <span style="color: white; background-color: red; padding: 5px;border-radius: 10px">-{{ $product->sale_price }}%</span>
                           </a>
                           @else
                           <a href="{{ route('public.product', $product->id) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
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
            {{$products->appends(request()->all())->links()}}
        </div>
    </div>
</div>
            
    </div>
</section>
@endsection

@section('script')
<script>
    document.querySelector('select[name="order"]').addEventListener('change', function() {
    document.getElementById('filterForm').submit();
});

document.querySelector('select[name="order_price"]').addEventListener('change', function() {
    document.getElementById('filterFormPrice').submit();
});
</script>

@endsection

