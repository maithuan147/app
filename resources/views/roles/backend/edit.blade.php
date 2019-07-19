@extends('layouts.layout')
@section('title', 'Edit Role')
@push('head')
    <link href="{{ asset('css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/AdminLTE/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
            folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('css/AdminLTE/skins/_all-skins.min.css') }}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush
@section('content')
    <div class="content-wrapper" style="min-height: calc(100vh - 105px);margin-bottom:-30px">
        <section class="content-header">
            <h1>
                List Tables
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li><a href="{{ url('dashboard/role') }}">Role</a></li>
                <li class="active">Edit</li>
            </ol>
        </section>
        <form method="POST" action="{{ route('dashboard.role.update',$role) }}" class="mx-15 mt-20">
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
                                    'name'  => 'name',
                                    'required' => true,
                                    'default' => $role->getName(),
                                    'placeholder' => 'Admin',
                                ])
                            </div>
                            <div class="form-group col-md-12">
                                @include('components.textarea.textarea',[
                                    'class' => 'form-control',
                                    'label' => __('Description'),
                                    'name'  => 'description',
                                    'required' => true,
                                    'default' => $role->getDescription(),
                                    'placeholder' => 'Highest role in system'
                                ])
                            </div> 
                        </div>
                    </div>
                    <p></p>
                    <div class="bg-white widget">
                        <div class="widget-title widget-body">
                            <div class="btn-set" style="margin-top:-10px;padding-bottom:0px !important">
                                <h4>Permission Flags</h4>
                            </div>
                        </div>
                        <div class="widget-body role-label" style="margin-top:30px">
                            <input type="checkbox" class="js-cb-toggle-all" data-targets="target_cbs_id" id="target_cbs_id" value="all" name="permissions[]" {{ in_array('all', $role->getDsPer()) ? 'checked' : '' }}>
                            <label for="target_cbs_id" class="bg-999">All Permissions</label>
                            <ul class="sidebar-menu border-left" data-widget="tree">
                                <li class="treeview ml-30">
                                    <input type="checkbox" class="js-cb-post-toggle-all" id="target_cbs_id" data-targets="target_cbs_post_id" value="post" name="permissions[]" {{ in_array('post', $role->getDsPer()) ? 'checked' : '' }}>
                                    <a href="#" style="display:inline-block">
                                        <label for="" class="bg-e7804f">Post</label>
                                        <i class="fa fa-angle-left pull-right pull-right1" style="color:black;font-size:20px"></i>
                                    </a>
                                    <ul class="treeview-menu role-li">
                                        <li>
                                            @include('components.input.checkboxArray',[
                                                'checkbox' => 'role',
                                                'array' => 'getDsPer',
                                                'id' => 'target_cbs_post_id',
                                                'name'  => 'permissions',
                                                'value' => 'CP',
                                                'label' => __('Create')
                                            ])
                                        </li>
                                        <li>
                                            @include('components.input.checkboxArray',[
                                                'checkbox' => 'role',
                                                'array' => 'getDsPer',
                                                'id' => 'target_cbs_post_id',
                                                'name'  => 'permissions',
                                                'value' => 'RP',
                                                'label' => __('Read')
                                            ])
                                        </li>
                                        <li>
                                            @include('components.input.checkboxArray',[
                                                'checkbox' => 'role',
                                                'array' => 'getDsPer',
                                                'id' => 'target_cbs_post_id',
                                                'name'  => 'permissions',
                                                'value' => 'UP',
                                                'label' => __('Update')
                                            ])
                                        </li>
                                        <li>
                                            @include('components.input.checkboxArray',[
                                                'checkbox' => 'role',
                                                'array' => 'getDsPer',
                                                'id' => 'target_cbs_post_id',
                                                'name'  => 'permissions',
                                                'value' => 'DP',
                                                'label' => __('Delete')
                                            ])
                                        </li>
                                    </ul>
                                </li>

                                <li class="treeview ml-30">
                                    <input type="checkbox" class="js-cb-catagory-toggle-all" id="target_cbs_id" data-targets="target_cbs_catagory_id" value="category" name="permissions[]" {{ in_array('category', $role->getDsPer()) ? 'checked' : '' }}>
                                    <a href="#" style="display:inline-block">
                                        <label for="" class="bg-e7804f">Catagory</label>
                                        <i class="fa fa-angle-left pull-right pull-right1" style="color:black;font-size:20px"></i>
                                    </a>
                                    <ul class="treeview-menu role-li">
                                        <li>
                                            @include('components.input.checkboxArray',[
                                                'checkbox' => 'role',
                                                'array' => 'getDsPer',
                                                'id' => 'target_cbs_catagory_id',
                                                'name'  => 'permissions',
                                                'value' => 'CC',
                                                'label' => __('Create')
                                            ])
                                        </li>
                                        <li>
                                            @include('components.input.checkboxArray',[
                                                'checkbox' => 'role',
                                                'array' => 'getDsPer',
                                                'id' => 'target_cbs_catagory_id',
                                                'name'  => 'permissions',
                                                'value' => 'RC',
                                                'label' => __('Read')
                                            ])
                                        </li>
                                        <li>
                                            @include('components.input.checkboxArray',[
                                                'checkbox' => 'role',
                                                'array' => 'getDsPer',
                                                'id' => 'target_cbs_catagory_id',
                                                'name'  => 'permissions',
                                                'value' => 'UC',
                                                'label' => __('Update')
                                            ])
                                        </li>
                                        <li>
                                            @include('components.input.checkboxArray',[
                                                'checkbox' => 'role',
                                                'array' => 'getDsPer',
                                                'id' => 'target_cbs_catagory_id',
                                                'name'  => 'permissions',
                                                'value' => 'DC',
                                                'label' => __('Delete')
                                            ])
                                        </li>
                                    </ul>
                                </li>

                                <li class="treeview ml-30">
                                    <input type="checkbox" class="js-cb-tag-toggle-all" id="target_cbs_id" data-targets="target_cbs_tag_id" value="tag" name="permissions[]" {{ in_array('tag', $role->getDsPer()) ? 'checked' : '' }}>
                                    <a href="#" style="display:inline-block">
                                        <label for="" class="bg-e7804f">Tag</label>
                                        <i class="fa fa-angle-left pull-right pull-right1" style="color:black;font-size:20px"></i>
                                    </a>
                                    <ul class="treeview-menu role-li">
                                        <li>
                                            @include('components.input.checkboxArray',[
                                                'checkbox' => 'role',
                                                'array' => 'getDsPer',
                                                'id' => 'target_cbs_tag_id',
                                                'name'  => 'permissions',
                                                'value' => 'CT',
                                                'label' => __('Create')
                                            ])
                                        </li>
                                        <li>
                                            @include('components.input.checkboxArray',[
                                                'checkbox' => 'role',
                                                'array' => 'getDsPer',
                                                'id' => 'target_cbs_tag_id',
                                                'name'  => 'permissions',
                                                'value' => 'RT',
                                                'label' => __('Read')
                                            ])
                                        </li>
                                        <li>
                                            @include('components.input.checkboxArray',[
                                                'checkbox' => 'role',
                                                'array' => 'getDsPer',
                                                'id' => 'target_cbs_tag_id',
                                                'name'  => 'permissions',
                                                'value' => 'UT',
                                                'label' => __('Update')
                                            ])
                                        </li>
                                        <li>
                                            @include('components.input.checkboxArray',[
                                                'checkbox' => 'role',
                                                'array' => 'getDsPer',
                                                'id' => 'target_cbs_tag_id',
                                                'name'  => 'permissions',
                                                'value' => 'DT',
                                                'label' => __('Delete')
                                            ])
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
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
    <script src="{{ asset('js/jquery/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('js/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('js/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/dist/adminlte.min.js')}}"></script>
    <script src="{{ asset('js/jquery/js.js')}}"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script> CKEDITOR.replace('editor1'); </script>
    
@endpush

