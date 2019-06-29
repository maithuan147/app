<style>
    label{
        display: block;
    }
</style>
<form action="{{ route('tag.store') }}" method="POST">
    @csrf
    @method('POST')
    @include('input.text',[
        'label' => __('Name'),
        'name'  => 'name',
        'required' => true,
        'default' => '',
        'placeholder' => 'enter your title',
    ])
    
    <input type="submit">
</form>