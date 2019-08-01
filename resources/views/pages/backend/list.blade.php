@extends('layouts.layout')
@section('title', 'List Page')
@push('head')
    <link href="{{ asset('css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/AdminLTE/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
            folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('css/AdminLTE/skins/_all-skins.min.css') }}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet"href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush
@section('content')
    <div class="content-wrapper" style="min-height: calc(100vh - 200px);margin-bottom:-30px">
        <section class="content-header">
            <h1>
                {{ __('Simple Pages') }}
                <small>{{ __('preview of simple pages') }}</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i>{{ __('Dashboard') }}</a></li>
                <li><a href="#" class="active">{{ __('Pages') }}</a></li>
            </ol>
        </section>
        <div class="row nav-tabs">
            <div class="col-sm-6">
                <ul class="nav display-flex" id="myTab" role="tablist">
                    <li class="nav-item">
                    <a class="nav-link"  href="{{ route('dashboard.page.index') }}">{{ __('Lists Of page') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard.page.listTrash') }}">{{ __('Trash') }}</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-6 justify-content-end display-flex ml--15">
                <form action="{{ route('dashboard.page.index') }}" style="margin-bottom:0px" method="GET">
                    <input type="text" name="content" placeholder="{{ __('Seach...') }}" class="seach" value="{{ $query ?? '' }}">
                    <select name="fitter" style="height:25px" >
                        <option value="title" {{ (isset($queryFitter) && $queryFitter == 'title') ? 'selected' : '' }}>{{ __('Title') }}</option>
                        <option value="slug" {{ (isset($queryFitter) && $queryFitter == 'slug') ? 'selected' : '' }}>{{ __('Slug') }}</option>
                        <option value="name" {{ (isset($queryFitter) && $queryFitter == 'name') ? 'selected' : '' }}>{{ __('Category') }}</option>
                    </select>
                    <input type="submit"  class="btn-primary border-367fa9">
                </form>
            </div>
        </div>
    <form action="{{ route('dashboard.page.bulk') }}" method="post">
        @csrf
        @method('DELETE')
        <div class="row bg-white font-size-13 mx-15 py-10 mt-15 mb-3">
            <div class="col-sm-6">
                <div class="dropdown display-inline-block">
                    <select name="bulk_option" class="btn btn-primary dropdown-toggle mr-5">
                        <option value="1">{{ __('Bulk Actions') }}</option>
                        <option value="bulkTrash">{{ __('Trash') }}</option>
                    </select>
                    <input type="submit" value="{{ __('Submit') }}" class="btn btn-success">
                    <span style="color:red">{{ session('errorOption') }}</span>
                </div>
            </div>
            <div class="col-sm-6 justify-content-end display-flex">
                <a href="{{ route('dashboard.page.create') }}" class="bg-36c6d3 px-10 mr-10 color-white"><i class="fa fa-plus"></i> {{ __('Create') }}</a>
                <a href="" class="bg-36c6d3 px-10 color-white"><i class="fas fa-sync"></i>{{ __(' Reload') }} </a>			
            </div>
        </div>
        <div class="mr-30">
            <table class="table table-striped mx-15 mb-0 ">
                <tr class="bg-fbfcfd color-AFAFAF">
                    <th width="3%" class="text-center"><input type="checkbox" class="js-cb-toggle-all" data-targets="target_cbs_id"></th>
                    <th width="7%" class="text-center" >{{ __('THUMBNAIL') }}</th>
                    <th width="30%" class=""><a href="{{ $myOrder['title'] ?? '' }}">{{ __('TITLE') }}<i class="{{ $mySortIcon['iconTitle'] ?? '' }}"></i></a></th>
                    <th width="10%" class="text-center"><a href="{{ $myOrder['slug'] ?? '' }}">{{ __('CREATED_BY ') }}<i class="{{ $mySortIcon['iconSlug'] ?? '' }}"></i></a></th>
                    <th width="15%" class="text-center">{{ __('TEMPLATE') }}</th>
                    <th width="10%" class="text-center"><a href="{{ $myOrder['status'] ?? '' }}">{{ __('STATUS ') }}<i class="{{ $mySortIcon['iconStatus'] ?? '' }}"></i></a></th>
                    <th width="15%" class="text-center">{{ __('OPERATIONS') }}</th>
                </tr>
            @if ($pages->count() > 0)
                @foreach ($pages as $page)
                    <tr class="child">
                        <td class="text-center vertical-align-middle"><input type="checkbox" name="bulk_id[]" id="target_cbs_id" value="{{ $page->getId() }}"></td>
                        <td class="text-center vertical-align-middle"><img src="{{ asset(Storage::url($page->getImage())) }}" alt="#" width="50px"></td>
                        <td class=" vertical-align-middle"><a href="#" title="{{ $page->getTitle() }}">{{ $page->getTitle() }}</a></td>
                        <td class="text-center vertical-align-middle">{{ $page->getCreatedBy() }}</td>
                        <td class="text-center vertical-align-middle">{{ $page->getTemplate() }}</td>
                        <td class="text-center vertical-align-middle custom-opera {{ $page->getBgStatus() }}">{{ $page->getStatus() }}</td>
                        <td class="text-center vertical-align-middle"> 
                            <a href="{{ route('dashboard.page.edit',$page->getId()) }}" class="btn btn-primary">{{ __('Edit') }}</a>
                            <label for="trash-{{ $page->getId() }}" class="btn btn-warning">{{ __('Trash') }}</label>
                        </td>
                    </tr>
                @endforeach
            </table>
            @else
                </table> 
                <h4 class="text-danger text-center mt-15"> No page</h4>
            @endif
    </form>
        </select>
            <div class="row mr-a30 ml-0">
                <div class="col-sm-6">
                    <span class="dt-length-records">
                    <i class="fa fa-globe"></i> <span class="d-none d-sm-inline">{{ __('Show from') }}</span> {{ $pages->firstItem() }} {{ __('to') }} {{ $pages->lastItem() }} {{ __('in') }} <span class="badge badge-secondary bold badge-dt">{{ $pages->total() }}</span> <span class="hidden-xs">{{ __('records') }}</span>
                    </span>
                </div>
                <div class="col-sm-6 display-flex justify-content-end">{{ $pages->appends($orderBy)->links() }}</div>
            </div>
        </div>
            @include('components.alert.alertSuccess')
    </div>
    
    @foreach ($pages as $page)
        <form action="{{ route('dashboard.page.trash',$page->getId()) }}" method="POST" style="width:0px;height:0px">
            @csrf
            @method('DELETE')
            <input type="submit" value="Trash" id="trash-{{ $page->getId() }}" style="visibility:hidden;">
        </form>
    @endforeach

    
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{ asset('js/jquery/js.js')}}"></script>
    <script src="{{ asset('js/jquery/alert.js')}}"></script>

@endpush
