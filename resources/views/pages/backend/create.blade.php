@extends('layouts.layout')
@section('title', 'Add page')
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
<!-- Amsify Plugin -->
@endpush
@section('content')
<div class="content-wrapper" style="min-height: calc(100vh - 200px)">
    <section class="content-header">
        <h1>{{ __('Create page') }} </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('Dashboard') }}</a></li>
            <li><a href="{{ url('dashboard/page') }}">{{ __('page') }} </a></li>
            <li class="active">{{ __('Create') }}</li>
        </ol>
    </section>
    <form action="{{ route('dashboard.page.store') }}" method="POST" enctype="multipart/form-data" class="mx-15 mt-20">
        @csrf
        @method('POST')
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
                            'default' => '',
                            'placeholder' => __('Title'),
                            ])
                        </div>
                        <div class="form-group col-md-12">
                            @include('components.textarea.textarea',[
                                'class' => 'form-control',
                                'label' => __('Description'),
                                'name'  => 'description',
                                'required' => true,
                                'default' => '',
                                'placeholder' => __('Short description')
                            ])
                        </div>
                        <div class="form-group col-md-12">
                            <label>{{ __('Content') }} <span class="color-red"> *</span></label>
                            <textarea name="content" class="form-control" id="editor1" required>{{ old('content') }}</textarea>
                            @error('content')
                                <small class="form-text text-danger">{{ $message }}</a></small>
                            @enderror
                        </div>
                    </div>
                </div>
                <p></p>
            </div>
            <div class="col-md-3 right-sidebar">
                <div class="bg-white widget">
                    <div class="widget-title">
                        <div class="btn-set">
                            <button type="submit" name="submit" value="save" class="btn btn-info">
                                <i class="fa fa-save"></i> {{ __(' Save') }}
                            </button>
                            &nbsp;
                            <button type="submit" name="submit1" value="apply" class="btn btn-success">
                                <i class="fa fa-check-circle"></i> {{ __(' Save & Exit') }}
                            </button>
                        </div>
                    </div>
                    <p></p>
                    <div class="widget-body">
                        @include('components.input.file',[
                        'class' => 'form-control',
                        'label' => __('Thumbnail'),
                        'img' => 'img/placeholder.png',
                        'name' => 'image',
                        'default' => '',
                        ])
                    </div>
                    <div class="widget-body">
                        <h4 style="color:black;margin-bottom:0px !important" >{{ __('Select Parent') }} <span class="color-red"> *</span></h4>
                        <span class="pull-right-container">
                        <div class="form-group">
                            @include('components.select.option',[
                            'class' => 'form-control',
                            'name' => 'parent_id',
                            'default' => '',
                            'options' => $pages,
                            ])
                        </div>
                    </div>
                    <div class="widget-body">
                        <h4 style="color:black;margin-bottom:0px !important">{{ __('Template') }} <span class="color-red"> *</span></h4>
                        <span class="pull-right-container">
                        <div class="form-group">
                            @include('components.select.option',[
                            'class' => 'form-control',
                            'name' => 'tembplate',
                            'default' => '',
                            'options' => ['Default' => __('Deafault'),'Black' => __('Black')],
                            ])
                        </div>
                    </div>
                    <div class="widget-body">
                        <h4 style="color:black;margin-bottom:0px !important">{{ __('Status') }} <span class="color-red"> *</span></h4>
                        <span class="pull-right-container">
                        <div class="form-group">
                            @include('components.select.option',[
                            'class' => 'form-control',
                            'name' => 'status',
                            'default' => '',
                            'options' => ['0' => __('Draft'),'1' => __('Published')],
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
<script src="{{ asset('js/jquery/jquery.min.js')}}"></script>

<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('js/jquery-ui/jquery-ui.min.js')}}"></script>

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

@endpush
