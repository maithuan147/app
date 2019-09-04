@extends('layouts.japanshop')
@section('title', 'Post')
@section('content')
<main>
        <section class="shop-details">
            <div class="container">
                <div class="shop__section">
                    <p>Trang Chủ<img src="{{ url('img/icon-shop-right.svg') }}">Tất cả danh mục<img src="{{ url('img/icon-shop-right.svg') }}">Sức Khoẻ<img src="{{ url('img/icon-shop-right.svg') }}"><b>{{ $product->getEditName() }}</b></p>
                </div>
            </div>
            <div class="container">
                <div class="shop-details__section">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="shop-details__section__slide">
                                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"><div class="escape"></div></li>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="1"><div class="escape"></div></li>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="2"><div class="escape"></div></li>
                                        </ol>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="{{ url('img/featured-products__slide2.png') }}">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="{{ url('img/featured-products__slide4.png') }}">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="{{ url('img/featured-products__slide2.png') }}">
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="shop-details__section-info">
                                    <h3>{{ $product->getEditName() }}</h3>
                                    <p class="shop-details__section-info1">{!! $product->getContent() !!}</p>
                                    <p class="shop-details__section-info2">{{ $product->getpriceMain() }} VNĐ</p>
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination">
                                            <li class="page-item"><a class="page-link" href="#">-</a></li>
                                            <li class="page-item"><a class="page-link page-link1" href="#">01</a></li>
                                            <li class="page-item"><a class="page-link" href="#">+</a></li>
                                        </ul>
                                    </nav>
                                    <p class="cart--color-pink"><img src="{{ url('img/cart--color-pink.svg') }}" alt="#"> Thêm vào giỏ hàng</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="buy-together">
            <div class="container">
                <h4>Các sản phẩm thường được mua cùng</h4>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="hot-products__section-slide">
                                <img src="{{ url('img/featured-products__slide1.png') }}" class="hot-products__section-img" alt="#">
                                <p class="hot-products__section-first">Mặt nạ chống nhăn vùng mắt KOSE</p>
                                <h5>300,000 VNĐ</h5>
                                <p class="cart--color-pink"><img src="{{ url('img/cart--color-pink.svg') }}" alt="#"> Thêm vào giỏ hàng</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="hot-products__section-slide">
                                <img src="{{ url('img/featured-products__slide1.png') }}" class="hot-products__section-img" alt="#">
                                <p class="hot-products__section-first">Mặt nạ chống nhăn vùng mắt KOSE</p>
                                <h5>300,000 VNĐ</h5>
                                <p class="cart--color-pink"><img src="{{ url('img/cart--color-pink.svg') }}" alt="#"> Thêm vào giỏ hàng</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="hot-products__section-slide">
                                <img src="{{ url('img/featured-products__slide1.png') }}" class="hot-products__section-img" alt="#">
                                <p class="hot-products__section-first">Mặt nạ chống nhăn vùng mắt KOSE</p>
                                <h5>300,000 VNĐ</h5>
                                <p class="cart--color-pink"><img src="{{ url('img/cart--color-pink.svg') }}" alt="#"> Thêm vào giỏ hàng</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="hot-products__section-slide">
                                <img src="{{ url('img/featured-products__slide1.png') }}" class="hot-products__section-img" alt="#">
                                <p class="hot-products__section-first">Mặt nạ chống nhăn vùng mắt KOSE</p>
                                <h5>300,000 VNĐ</h5>
                                <p class="cart--color-pink"><img src="{{ url('img/cart--color-pink.svg') }}" alt="#"> Thêm vào giỏ hàng</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection