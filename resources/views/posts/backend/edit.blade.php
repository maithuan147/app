@extends('layouts.layout')
@section('title', 'Edit Post')
@push('head')
<link href="{{ asset('css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('css/AdminLTE/AdminLTE.min.css') }}">
<!-- AdminLTE Skins. Choose a skin from the css/skins
            folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="{{ asset('css/AdminLTE/skins/_all-skins.min.css') }}">
<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('css/MutySelect/amsify.suggestags.css') }}">
@endpush
@section('content')
<div class="content-wrapper" style="min-height: calc(100vh - 200px)">
    <section class="content-header">
        <h1>
            {{ __('Edit Post') }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('Dashboard') }}</a></li>
            <li><a href="{{ url('dashboard/post') }}">{{ __('Post') }} </a></li>
            <li class="active">{{ __('Edit') }}</li>
        </ol>
    </section>
    <form action="{{ route('dashboard.post.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="mx-15 mt-20">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-9">
                <div class="main-form bg-white pxy-15">
                    <div class="form-body row">
                        <div class="form-group col-md-12">
                            @include('components.input.text',[
                            'class' => 'form-control',
                            'label' => __('Title'),
                            'name' => 'title',
                            'required' => true,
                            'default' => $post->getEditTitle(),
                            'placeholder' => 'enter your title',
                            ])
                        </div>
                        <div class="form-group col-md-12">
                            @include('components.textarea.textarea',[
                                'class' => 'form-control',
                                'label' => __('Description'),
                                'name'  => 'description',
                                'required' => true,
                                'default' => $post->getDescription(),
                                'placeholder' => __('Short description')
                            ])
                        </div>
                        <div class="form-group col-md-12">
                            <label>{{ __('Content') }} <span class="color-red"> *</span></label>
                            <textarea name="content" class="form-control" id="editor1" required>{{ str_ireplace($restrictedWords,'***',old('content',$post->getContent())) }}</textarea>
                            @error('content')
                                <small class="form-text text-danger">{{ $message }} <a href="{{ url('dashboard/options-restricted') }}">{{ __('Xem từ bị cấm')}}</a></small>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            @include('components.select.option',[
                            'class' => 'form-control',
                            'label' => __('Status'),
                            'name' => 'status',
                            'required' => true,
                            'default' => $post->status,
                            'options' => ['0' => __('Draft'),'1' => __('Published')],
                            ])
                        </div>
                    </div>
                </div>
                <p></p>
            </div>
            <div class="col-md-3 right-sidebar">
                <div class="bg-white widget">
                    <div class="widget-title">
                        <div class="btn-set">
                            <button type="submit" class="btn btn-info">
                                <i class="fa fa-save"></i> {{ __(' Save') }}
                            </button>
                            &nbsp;
                            <button type="submit" name="submit1" value="apply" class="btn btn-success">
                                <i class="fa fa-check-circle"></i>{{ __(' Save & Exit') }} 
                            </button>
                        </div>
                    </div>
                    <p></p>
                    <div class="widget-body">
                        @include('components.input.file',[
                        'class' => 'form-control',
                        'label' => __('Thumbnail'),
                        'img' => Storage::url($post->getThumbnail()),
                        'name' => 'thumbnail',
                        'default' => $post->getThumbnail(),
                        ])
                    </div>
                    <div class="widget-body">
                        <ul class="sidebar-menu" data-widget="tree">
                            <li class="treeview">
                                <a href="#">
                                    <h4 style="color:black">{{ __('Category') }} <span class="color-red"> *</span></h4>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right" style="color:black;font-size:20px"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    @foreach ($categories as $category)
                                    <div class="color-check">
                                        @include('components.input.checkboxArray',[
                                            'checkbox' => 'post',
                                            'array' => 'getIdCategories',
                                            'id' => $category->getId(),
                                            'class' => 'ml-'.$category->ancestors()->count(),
                                            'name' => 'category_ids',
                                            'value' => $category->getId(),
                                            'label' => $category->getName()
                                        ])
                                    </div>
                                    @endforeach
                                </ul>
                                @error('category_ids')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </li>
                        </ul>
                        <div></div>
                    </div>
                    <div class="widget-body">
                        <h4 style="color:black">{{ __('Tag') }} <span class="color-red"> *</span></h4>
                        <span class="pull-right-container">
                        <div class="form-group">
                            @include('components.input.text',[
                                'class' => 'form-control',
                                'label' => __(''),
                                'name' => 'name',
                                'default' => $tagName,
                                'placeholder' => __('Tag1,Tag2,...'),
                                ])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
@push('scripts')
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

<script src="{{ asset('js/MutySelect/jquery.amsify.suggestags.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('js/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('js/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('js/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{ asset('js/dist/adminlte.min.js')}}"></script>
<script src="{{ asset('js/Upload/uploadImg.js')}}"></script>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('editor1');
</script>
<script type="text/javascript">
    var jArray = {!! json_encode($tagsArray ?? "") !!};
	$('input[name="name"]').amsifySuggestags({
        suggestions: jArray,
    });
</script>
@endpush

    