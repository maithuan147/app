<style>
    label{
        display: block;
    }
    </style>
    <form action="{{ route('tag.update',$tag) }}" method="POST">
        @csrf
        @method('PUT')
    @include('input.text',[
        'label' => __('Name'),
        'name'  => 'name',
        'required' => true,
        'default' => $tag->getName(),
        'placeholder' => 'enter your title',
    ])
        <input type="submit">
    </form>