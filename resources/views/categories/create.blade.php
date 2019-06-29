<style>
    label{
        display: block;
    }
</style>
<form action="{{ route('categories.store') }}" method="POST">
    @csrf
    @method('POST')
    @include('input.text',[
        'label' => __('Name'),
        'name'  => 'name',
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
        'label' => __('Slug'),
        'name'  => 'slug',
        'required' => true,
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
    
    <input type="submit">
</form>