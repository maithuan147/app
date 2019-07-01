<style>
    label{
        display: block;
    }
</style>
    <form action="{{ route('post.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
    @include('input.text',[
        'label' => __('Title'),
        'name'  => 'title',
        'required' => true,
        'default' => $post->getTitle(),
        'placeholder' => 'enter your title',
    ])
    @include('input.text',[
        'label' => __('Description'),
        'name'  => 'description',
        'required' => true,
        'default' => $post->getDescription(),
        'placeholder' => 'enter your title',
    ])
    @include('input.text',[
        'label' => __('Content'),
        'name'  => 'content',
        'required' => true,
        'default' => $post->getContent(),
        'placeholder' => 'enter your title',
    ])
    @include('input.text',[
        'label' => __('Slug'),
        'name'  => 'slug',
        'default' => $post->getSlug(),
        'placeholder' => 'enter your title',
    ])
    @include('select.option',[
        'label' => __('Status'),
        'name'  => 'status',
        'required' => true,
        'default' => $post->getStatus(),
        'options' => ['0' => 'Off' , '1' => 'On']
    ])
    <div>Category</div>
    @php
        $postCategories = $post->getIdCategories();
        $postTags = $post->getIdTags();
    @endphp
    @foreach ($categories as $category)
        <input type="checkbox" 4
            value="{{ $category->id }}" {{ (in_array($category->id, $postCategories)) ? 'checked' : '' }} 
            name="category_ids[]" >
        <label for="" style="display:inline">{{ $category->name }}</label>
    @endforeach
    @error('category_ids')
        <small class="form-text text-danger">{{ $message }}</small>
    @enderror
    <div></div>
    <div>Tag</div>
    @foreach ($tags as $tag)
        <input type="checkbox" value="{{ $tag->id }}" {{ (in_array($tag->id, $postTags)) ? 'checked' : '' }}  name="tag_ids[]">
        <label for="" style="display:inline">{{ $tag->name }}</label>
    @endforeach
    @error('tag_ids')
        <small class="form-text text-danger">{{ $message }}</small>
    @enderror
    <div></div>
        <input type="submit">
    </form>
    