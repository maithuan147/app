<style>
    
</style>
<head>
    <link href="{{ asset('css/test/app.css') }}" rel="stylesheet">
</head>
<form action="{{ route('post.store') }}" method="POST">
    @csrf
    @method('POST')
    @include('input.text',[
        'label' => __('Title'),
        'name'  => 'title',
        'required' => true,
        'default' => '',
        'placeholder' => 'enter your title',
    ])
    @include('input.text',[
        'label' => __('Description'),
        'name'  => 'description',
        'required' => true,
        'default' => '',
        'placeholder' => 'enter your title',
    ])
    @include('input.text',[
        'label' => __('Content'),
        'name'  => 'content',
        'required' => true,
        'default' => '',
        'placeholder' => 'enter your title',
    ])
    @include('input.text',[
        'label' => __('Slug'),
        'name'  => 'slug',
        'default' => '',
        'placeholder' => 'enter your title',
    ])
    @include('select.option',[
        'label' => __('Status'),
        'name'  => 'status',
        'required' => true,
        'default' => '',
        'options' => ['0' => 'Off' , '1' => 'On'],
    ])
    <div>Category</div>
    @foreach ($categories as $category)
        <input type="checkbox" value="{{ $category->getId() }}" name="category_ids[]">
        <label for="" style="display:inline">{{ $category->getName() }}</label>
    @endforeach
    <div></div>
    <div>Tag</div>
    @foreach ($tags as $tag)
        <input type="checkbox" value="{{ $tag->getId() }}" name="tag_ids[]">
        <label for="" style="display:inline">{{ $tag->getName() }}</label>
    @endforeach
    <div></div>
    <input type="submit">
</form>