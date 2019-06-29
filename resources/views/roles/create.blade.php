<style>
    div label {
        display: inline !important;
    }
</style>
<head>
    <link href="{{ asset('css/test/app.css') }}" rel="stylesheet">
</head>
<form action="{{ route('role.store') }}" method="POST">
    @csrf
    @method('POST')
    @include('input.text',[
        'label' => __('Name'),
        'name'  => 'name',
        'required' => true,
        'default' => '',
        'placeholder' => 'enter your title',
    ])
    <hr>
    <h3>Post</h3>
    <div>
        @include('input.checkbox',[
            'name'  => 'permissions[]',
            'value' => 'CP',
            'label' => __('Create')
        ])
        @include('input.checkbox',[
            'name'  => 'permissions[]',
            'value' => 'RP',
            'label' => __('Read')
        ])
        @include('input.checkbox',[
            'name'  => 'permissions[]',
            'value' => 'UP',
            'label' => __('Update')
        ])
        @include('input.checkbox',[
            'name'  => 'permissions[]',
            'value' => 'DP',
            'label' => __('Delete')
        ])
    </div>
    <hr>
    <h3>Catagory</h3>
    <div>
        @include('input.checkbox',[
            'name'  => 'permissions[]',
            'value' => 'CC',
            'label' => __('Create')
        ])
        @include('input.checkbox',[
            'name'  => 'permissions[]',
            'value' => 'RC',
            'label' => __('Read')
        ])
        @include('input.checkbox',[
            'name'  => 'permissions[]',
            'value' => 'UC',
            'label' => __('Update')
        ])
        @include('input.checkbox',[
            'name'  => 'permissions[]',
            'value' => 'DC',
            'label' => __('Delete')
        ])
    </div>
    <hr>
    <h3>Tag</h3>
    <div>
        @include('input.checkbox',[
            'name'  => 'permissions[]',
            'value' => 'CT',
            'label' => __('Create')
        ])
        @include('input.checkbox',[
            'name'  => 'permissions[]',
            'value' => 'RT',
            'label' => __('Read')
        ])
        @include('input.checkbox',[
            'name'  => 'permissions[]',
            'value' => 'UT',
            'label' => __('Update')
        ])
        @include('input.checkbox',[
            'name'  => 'permissions[]',
            'value' => 'DT',
            'label' => __('Delete')
        ])
    </div>
    <div></div>
    <input type="submit">
</form>