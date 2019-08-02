<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/japanshop.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Monda|Montserrat|Russo+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    @stack('head')
</head>
<body>
    <header>
        <div class="header__address--border-bottom">
            <div class="container">
                <div class="header__address">
                    <span><img src="{{ asset('img/icon-telephone-before.svg')}}" alt="#">{{ $information->phone }}</span>
                    <span><img src="{{ asset('img/icon-location-before.svg')}}" alt="#">{{ $information->address }}</span>
                    <a class="float-right header__address--border-right" href="#">Đăng Ký</a>
                    <a class="float-right header__address--border-right1" href="#">Đăng Nhập</a>
                </div>
            </div>
        </div>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="bug-home.html"><img src="{{ asset(Storage::url($information->logo))}}" alt="#"   style="width:60px;height:60px">
                    <div class="header__search">
                    <h2>Shop Hàng Nhật</h2>
                    <p>Chuyên Hàng Nội Địa Nhật Bản</p>
                    </div>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <div class="btn-group">
                              <button type="button" class="btn-danger1 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="icon-dropdown-toggle" style="background-image: url({{asset('img/header-drop.svg')}})"></span> Tất cả danh mục</button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Separated link</a>
                              </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <form class="form-inline my-2 my-lg-0">
                                <input class="form-control mr-sm-2" type="search" placeholder="Tìm Kiếm..." aria-label="Search">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><img src="{{ asset('img/header-search.png')}}" alt="#"></button>
                            </form>
                        </li>
                    </ul>
                    <p class="header-cart"><img src="{{ asset('img/bg--icon-cart.svg')}}" alt="#">&nbsp; - &nbsp;2 món</p>
                </div>
            </nav>
        </div>
        <div class="slide-bar">
            <nav class="navbar navbar-expand-lg navbar-light bg-light box-shadow">
                <div class="container">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link slide-bar--margin-left" href="bug-home.html">Trang Chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="introduce.html">Giới Thiệu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="shop.html">Cửa Hàng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link home-color-pink" href="{{ url('japanshop/post') }}">Tư Vấn</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    @yield('content')
    <footer>
        <div class="container">
            <div class="footer-title">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4">
                            <ul class="list-unstyled">
                                <li class="footer-title-margin">
                                    <a href="{{ $information->facebook }}"><img src="{{ asset('img/img-fb.svg')}}" alt="#"></a>
                                    <a href="{{ $information->google }}" class="mx-40"><img src="{{ asset('img/img-p.svg')}}" alt="#"></a>
                                    <a href="{{ $information->instagram }}"><img src="{{ asset('img/img-in.svg')}}" alt="#"></a>
                                    {{-- <a href="#"><img src="{{ asset('img/icon-fb.svg')}}" alt="#" class=""></a> --}}
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4 text-center">
                            <img src="{{ asset(Storage::url($information->logo))}}" alt="#" style="width:60px;height:60px">
                        </div>
                        <div class="col-md-4 text-right text-center-mobi">
                            <a href="#"><img src="{{ asset('img/icon-paypal.svg')}}" alt="#"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-address">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <div class="footer-address__section">
                                <img src="{{ asset('img/icon-tele-footer.svg')}}" alt="#">
                                <p class="font-weight-bold">Điện Thoại</p>
                                <p class="font-size-14px">{{ $information->phone }}</p>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <div class="footer-address__section">
                                <img src="{{ asset('img/icon-locat-footer.svg')}}" alt="#">
                                <p class="font-weight-bold">Địa Chỉ</p>
                                <p class="font-size-14px">{{ $information->address }}</p>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <div class="footer-address__section">
                                <img src="{{ asset('img/icon-email-footer.svg')}}" alt="#">
                                <p class="font-weight-bold">Email</p>
                                <p class="font-size-14px">{{ $information->email }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-info text-center">
                <p>{{ $information->textfooter }}</p>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    @stack('scripts')
</body>
</html>











