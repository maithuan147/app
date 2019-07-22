{{-- @foreach ($posts as $post)
    <div>{{ $post->title }}</div>
    <a href="{{ route('japanshop.post.postshow',$post->slug) }}">{!! $post->content !!}</a>
@endforeach --}}
@extends('layouts.japanshop')
@section('title', 'Post')
@section('content')
    <main>
        <section class="bog__seciton">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h3 class="blog-title text-center-mobi">Bài viết mới</h3>
                    <div class="bog__seciton--boder-bottom"></div>
                    <div class="row" style="margin-bottom:60px">
                        @foreach ($posts as $post)
                            <div class="col-sm-6">
                                <a href="{{ route('japanshop.post.postshow',$post->slug) }}">
                                <div class="bg-blog1" style="background-image: url({{asset(Storage::url($post->thumbnail))}})">
                                    <div class="bg-opacity">
                                        <div class="new-posts__section-bg text-left">
                                            <h3>{{ $post->title }}</h3>
                                            <p>{{ $post->created_at }}</p>
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    {{ $posts->links() }}
                </div>
                <div class="col-lg-4">
                    <div class="featured-post">
                        <h3 class="blog-title text-center-mobi">Bài nổi bật</h3>
                        <div class="bog__seciton--boder-bottom"></div>
                        <div class="bg-featured-post1">
                            <div class="featured-post__tite">
                                <h3>People with acne can't stop raving about this £12 cream...</h3>
                                <p>Thứ 5, ngày 22, 2018</p>
                            </div>
                        </div>
                        <div class="bg-featured-post2">
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
                        </div>
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


    