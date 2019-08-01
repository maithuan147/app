@extends('layouts.japanshop')
@section('title', 'Post')
@section('content')
<main>
    <section class="bog__seciton">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-details__seciton">
                        <div class="img-blog-detail" style="background-image: url({{asset(Storage::url($post->thumbnail))}})"></div> 
                        <h3 style="font-size:26px">{{ $post->title }}</h3>
                        <p class="blog-details__seciton-margin1">Thứ 5, ngày 22, 2018</p>
                        <div class="blog-details__seciton-title">
                                <div>{!! $post->content !!}</div>
                                <ul class="list-unstyled">
                                    <li>chia sẻ bài viết:
                                        <a href="#"><img src="{{ asset('img/blog-details-fb.svg')}}"></a>
                                        <a href="#"><img src="{{ asset('img/blog-details-cm.svg')}}"></a>
                                        <a href="#"><img src="{{ asset('img/blog-details-tw.svg')}}"></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="featured-post">
                        <h3 class="blog-title text-center-mobi">Bài nổi bật</h3>
                        <div class="bog__seciton--boder-bottom"></div>
                        @foreach ($postFeatured as $featured)
                        <div style="display:flex;margin-bottom:30px">
                            <img src="{{asset(Storage::url($featured->thumbnail))}}" alt="#" style="width:100px;height:100px;border-radius:10px">
                            <div class="featured-post__tite">
                                <h3>{{ $featured->title }}</h3>
                                <p>{{ $featured->getCreatedAt() }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="blog__section-follow">
                        <h3 class="text-center-mobi">Theo Dõi</h3>
                        <div class="bog__seciton--boder-bottom"></div>
                        <div class="row">
                            <div class="col-4">
                                <a href="#"><img src="{{ asset('img/img-blog-fb.svg')}}"></a>
                            </div>
                            <div class="col-4">
                                <a href="#"><img src="{{ asset('img/img-blog-in.svg')}}"></a>
                            </div>
                            <div class="col-4">
                                <a href="#"><img src="{{ asset('img/img-blog-tw.svg')}}"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection