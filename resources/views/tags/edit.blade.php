<style>
    label{
        display: block;
    }
    </style>
    <form action="{{ route('dashboard.tag.update',$tag) }}" method="POST">
        @csrf
        @method('PUT')
    @include('components.input.text',[
        'label' => __('Name'),
        'name'  => 'name',
        'required' => true,
        'default' => $tag->getName(),
        'placeholder' => 'enter your title',
    ])
    @include('components.select.option',[
        'label' => __('Select Parent Category'),
        'name'  => 'parent_id',
        'default' => '',
        'options' => $categories,
    ])
        <input type="submit">
    </form>