@extends('layouts.japanshop')
@section('title', 'Post')
@section('content')
    <main>
        <section class="shop">
            <div class="container">
                <div class="row mx-0">
                    <div class="col-md-3">
                        <div class="shop__title">
                            <div class="nav flex-column nav-pills">
                                <a class="nav-link active" href="{{ url('japanshop/product') }}" ><h3>Tất Cả Danh Mục</h3></a>
                                <a class="nav-link" href="{{ url('japanshop/product') }}">Xem Tất Cả</a>
                                @foreach ($categories as $category)
                                    <a class="nav-link" href="{{ route('japanshop.product.category',$category->slug) }}">{{ $category->name }}</a>
                                @endforeach
                                {{-- <a class="nav-link" href="?category=lam-dep">Làm Đẹp</a>
                                <a class="nav-link" href="?category=doi-song">Đời Sống</a>
                                <a class="nav-link" href="?category=thuc-pham-chuc-nang">Thực Phẩm Chức Năng</a>
                                <a class="nav-link" href="?category=khac">Khác</a> --}}
                            </div>
                            <h4>Mức Giá</h4>
                            <div class="text-center">
                            <img src="{{ url('img/price.png')}}" alt="#">
                            <p>55,000 VNĐ - 6,000,000 VNĐ</p>
                            <button><img src="{{ url('img/price-filter.svg')}}"> Áp dụng Lọc giá</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <div class="shop__section">
                                    <p>Trang Chủ<img src="{{ url('img/icon-shop-right.svg')}}"><span>Tất cả danh mục</span>{!! isset($products->first()->name) ? '<img src='.url("img/icon-shop-right.svg").'><b>'.$products->first()->name.'</b>' : '<img src='.url("img/icon-shop-right.svg").'><b>Xem Tất Cả</b>' !!}</p>
                                    <div class="shop__info">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h4>Tất cả danh mục</h4>
                                            </div>
                                            <div class="col-sm-6 mt--5">
                                                <div class="nav-item">
                                                    <div class="btn-group float-right">
                                                        <button type="button" class="btn-danger1 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="icon-dropdown-toggle" style="background-image: url({{asset('img/header-drop.svg')}})"></span> Tất cả danh mục</button>
                                                        <div class="dropdown-menu show-dropdown-menu">
                                                            <a class="dropdown-item" href="#">Độ phổ biến</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="#">Giá cao xuống thấp</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="#">Giá thấp xuống cao</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="shop__section-all">
                                        <div class="row">
                                            @foreach ($products as $product)
                                                <div class="col-lg-4 col-sm-6 col-xs-12 py-15">
                                                    <div class="hot-products__section-slide">
                                                        <img src="{{ url(Storage::url($product->getImage())) }}" class="hot-products__section-img" alt="#">
                                                        <p class="hot-products__section-first">{{ $product->getEditName() }}</p>
                                                        <h5>{{ $product->getPriceMain() }} VNĐ</h5>
                                                        <a href="{{ route('japanshop.product.details', $product->slug) }}"><p class="cart--color-pink"><img src="{{ url('img/cart--color-pink.svg')}}" alt="#"> Thêm vào giỏ hàng</p></a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
@push('scripts')
    <script>
        $(document).ready(function(){
            var page = window.location.href;
            $(".shop__title a").each(function(){
                if ($(this).attr("href") == page){
                    $(this).addClass("home-color-pink")
                }
            });     
        });
    </script>
@endpush