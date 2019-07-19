<style>
    label{
        display: block;
    }
</style>
<form action="{{ route('dashboard.tag.store') }}" method="POST">
    @csrf
    @method('POST')
    @include('components.input.text',[
        'label' => __('Name'),
        'name'  => 'name',
        'required' => true,
        'default' => '',
        'placeholder' => 'enter your title',
    ])
    @include('components.input.text',[
        'label' => __('Slug'),
        'name'  => 'slug',
        'default' => '',
        'placeholder' => 'enter your title',
    ])
    @include('components.select.option',[
        'label' => __('Select Parent Category'),
        'name'  => 'parent_id',
        'default' => '',
        'options' => $tags,
    ])
    <input type="submit">
</form>