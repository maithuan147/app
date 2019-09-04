@extends('layouts.layout')
@section('title', 'Edit Tag')
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
        <h1>{{ __('Edit Tag') }} </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('Dashboard') }}</a></li>
            <li><a href="{{ url('dashboard/product') }}">{{ __('Product') }} </a></li>
            <li><a href="{{ url('dashboard/product-tag') }}">{{ __('Tag') }} </a></li>
            <li class="active">{{ __('Edit') }}</li>
        </ol>
    </section>
    <form action="{{ route('dashboard.product-tag.update',$tag->getId()) }}" method="POST" class="mx-15 mt-20">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-9">
                <div class="main-form bg-white pxy-15">
                    <div class="form-body row">
                        <div class="form-group col-md-12">
                            @include('components.input.text',[
                            'class' => 'form-control',
                            'label' => __('Name'),
                            'name' => 'name',
                            'required' => true,
                            'default' => $tag->getName(),
                            'placeholder' => __('Name'),
                            ])
                        </div>
                        
                        <div class="form-group col-md-12">
                            @include('components.input.text',[
                            'class' => 'form-control',
                            'label' => __('Slug'),
                            'name' => 'slug',
                            'default' => $tag->getSlug(),
                            'placeholder' => __('Slug'),
                            ])
                        </div>
                    </div>
                </div>
                <p></p>
            </div>
            <div class="col-md-3 right-sidebar">
                <div class="bg-white widget">
                    <div class="widget-title">
                        <div class="btn-set" style="margin-top:-10px;padding-bottom:0px !important">
                            <h4>Actions</h4>
                        </div>
                    </div>
                    <div class="widget-body" style="margin-top:10px">
                        <button type="submit" name="submit" value="save" class="btn btn-info">
                        <i class="fa fa-save"></i> Save
                        </button>
                        &nbsp;
                        <button type="submit" name="submit1" value="apply" class="btn btn-success">
                        <i class="fa fa-check-circle"></i> Save &amp; Exit
                        </button>
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

<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('js/jquery-ui/jquery-ui.min.js')}}"></script>

<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('js/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{ asset('js/dist/adminlte.min.js')}}"></script>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
@endpush
