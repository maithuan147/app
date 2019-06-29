<style>
    label{
        display: block;
    }
    </style>
    <form action="{{ route('categories.update',$category) }}" method="POST">
        @csrf
        @method('PUT')
    @include('input.text',[
        'label' => __('Name'),
        'name'  => 'name',
        'required' => true,
        'default' => $category->getName(),
        'placeholder' => 'enter your title',
    ])
    @include('input.text',[
        'label' => __('Description'),
        'name'  => 'description',
        'required' => true,
        'default' => $category->getDescription(),
        'placeholder' => 'enter your title',
    ])
    @include('input.text',[
        'label' => __('Slug'),
        'name'  => 'slug',
        'required' => true,
        'default' => $category->getSlug(),
        'placeholder' => 'enter your title',
    ])
    @include('select.option',[
        'label' => __('Status'),
        'name'  => 'status',
        'required' => true,
        'default' => $category->getStatus(),
        'options' => ['0' => 'Off' , '1' => 'On']
    ])
        <input type="submit">
    </form>