@foreach ($posts as $post)
    <div>{{ $post->title }}</div>
    <a href="{{ route('dashboard.post.postshow',$post->slug) }}">{!! $post->content !!}</a>
@endforeach