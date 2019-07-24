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
                        <div class="bg-featured-post" style="background-image: url({{asset(Storage::url($featured->thumbnail))}})">
                            <div class="featured-post__tite">
                                <h3>People with acne can't stop raving about this £12 cream...</h3>
                                <p>Thứ 5, ngày 22, 2018</p>
                            </div>
                        </div>
                        @endforeach
                        {{-- <div class="bg-featured-post2">
                            <div class="featured-post__tite">
                                <h3>These are the best primers in the business that will ens...</h3>
                                <p>Thứ 5, ngày 22, 2018</p>
                            </div>
                        </div>
                        <div class="bg-featured-post3">
                            <div class="featured-post__tite">
                                <h3>We asked a lipstick obsessive to try Glossier's Gener...</h3>
                                <p>Thứ 5, ngày 22, 2018</p>
                            </div>
                        </div> --}}
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