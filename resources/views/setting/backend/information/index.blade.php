@extends('layouts.layout')
@section('title', 'Edit Information')
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
@endpush
@section('content')
<div class="content-wrapper" style="min-height: calc(100vh - 200px)">
    <section class="content-header">
        <h1>
            {{ __('Edit Admin') }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('Dashboard') }}</a></li>
            <li><a href="{{ url('dashboard/information') }}">{{ __('Information') }} </a></li>
            <li class="active">{{ __('Edit') }}</li>
        </ol>
    </section>
    <form action="{{ route('dashboard.options-information.update', $information->id) }}" method="POST" enctype="multipart/form-data" class="mx-15 mt-20">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-9">
                <div class="main-form bg-white pxy-15">
                    <div class="form-body row">
                        
                        <div class="form-group col-md-6">
                            @include('components.input.email',[
                            'class' => 'form-control',
                            'label' => __('Email'),
                            'required' => true,
                            'name' => 'email',
                            'default' => $information->email,
                            'placeholder' => __('Ex: example@gmail.com'),
                            ])
                        </div>

                        <div class="form-group col-md-6">
                            @include('components.input.text',[
                            'class' => 'form-control',
                            'label' => __('Phone'),
                            'name' => 'phone',
                            'required' => true,
                            'default' => $information->phone,
                            'placeholder' => __('01253988915'),
                            ])
                        </div>
                        
                        <div class="form-group col-md-6">
                            @include('components.input.text',[
                            'class' => 'form-control',
                            'label' => __('Adress'),
                            'name' => 'address',
                            'required' => true,
                            'default' => $information->address,
                            'placeholder' => __('Ex: 12 Le Duc Tho, Ho Chi Minh City'),
                            ])
                        </div>
                        
                        <div class="form-group col-md-6">
                            @include('components.input.text',[
                            'class' => 'form-control',
                            'label' => __('Facebook'),
                            'name' => 'facebook',
                            'required' => true,
                            'default' => $information->facebook,
                            'placeholder' => __('https://facebook.com'),
                            ])
                        </div>

                        <div class="form-group col-md-6">
                            @include('components.input.text',[
                            'class' => 'form-control',
                            'label' => __('Google'),
                            'name' => 'google',
                            'required' => true,
                            'default' => $information->google,
                            'placeholder' => __('Ex: john.smith'),
                            ])
                        </div>

                        <div class="form-group col-md-6">
                            @include('components.input.text',[
                            'class' => 'form-control',
                            'label' => __('Instagram'),
                            'name' => 'instagram',
                            'required' => true,
                            'default' => $information->instagram,
                            'placeholder' => __('Thuan123'),
                            ])
                        </div>

                        <div class="form-group col-md-12">
                            @include('components.textarea.textarea',[
                            'label' => __('Text Footer'),
                            'class' => 'form-control',
                            'name' => 'textfooter',
                            'required' => true,
                            'default' => $information->textfooter,
                            'placeholder' => __('© shophangnhat 2018 All Rights Reserved'),
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
                        'label' => __('Logo'),
                        'img' => Storage::url($information->logo),
                        'name' => 'logo',
                        'default' => $information->logo,
                        ])
                    </div>
                    <div class="widget-body">
                        <h4 style="color:black;margin-bottom:-10px">{{ __('Status') }} <span class="color-red"> *</span></h4>
                        <span class="pull-right-container">
                        <div class="form-group">
                            @include('components.select.option',[
                            'class' => 'form-control',
                            'name' => 'status',
                            'default' => $information->status,
                            'options' => ['0' => __('Maintenance'),'1' => __('Activity')],
                            ])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @include('components.alert.alertSuccess')
</div>
@endsection
@push('scripts')
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
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
<script src="{{ asset('js/jquery/alert.js')}}"></script>
@endpush

    