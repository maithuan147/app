<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Bootstrap 3.3.7 -->
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
    <link href="https://unpkg.com/ionicons@4.5.5/dist/css/ionicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    @stack('head')
</head>

<body style="margin-bottom:0px !important;padding-top:0px">
<header class="main-header" style="background:black">
        <!-- Logo -->
        <a href="{{ url('dashboard') }}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Admin</b>LTE</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                <li class="dropdown"><a href="https://trello.com" class="nav-link color-white"><i class="fa fa-globe"           style="margin-right:5px"></i>{{ __('View website') }}</a></li>
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope color-white"></i>
                            <span class="label label-success">4</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">{{ __('You have 4 messages') }}</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li>
                                        <!-- start message -->
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="{{ asset('img/user2.jpg') }}" class="img-circle"
                                                    alt="User Image">
                                            </div>
                                            <h4>
                                                Support Team
                                                <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <!-- end message -->
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="{{ asset('img/user2.jpg') }}" class="img-circle"
                                                    alt="User Image">
                                            </div>
                                            <h4>
                                                AdminLTE Design Team
                                                <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="{{ asset('img/user2.jpg') }}" class="img-circle"
                                                    alt="User Image">
                                            </div>
                                            <h4>
                                                Developers
                                                <small><i class="fa fa-clock-o"></i> Today</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">See All Messages</a></li>
                        </ul>
                    </li>
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="hidden-xs">{{ __('Theme') }} </span><i class="fa fa-angle-down color-white"></i>
                        </a>
                        <ul class="dropdown-menu icon-lang" style="width:auto !important">
                            <li class="user-header" style="height:auto !important">
                                <a href="#" id="bg-4fa2c2">{{ __(' Default') }}</a>
                                <a href="#" id="bg-black">{{ __(' Black') }}</a> 
                            </li>
                            <!-- Menu Body -->
                        </ul>
                    </li>
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="hidden-xs">{{ __('Language') }} </span><i class="fa fa-angle-down color-white"></i>
                        </a>
                        <ul class="dropdown-menu icon-lang" style="width:auto !important">
                            <li class="user-header text-left" style="height:auto !important">
                                <a href="{{ route('dashboard.language',['language' => 'en']) }}"><img src="{{ asset('img/us.png') }}" alt="#"> {{ __(' English') }}</a>
                                <a href="{{ route('dashboard.language',['language' => 'vi']) }}"><img src="{{ asset('img/vn.png') }}" alt="#">{{ __(' Vietnam') }}</a> 
                            </li>
                            <!-- Menu Body -->
                        </ul>
                    </li>
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ asset('img/1559813360b4.jpg') }}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header" style="text-align:center !important">
                                <form action="#" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <label for="upload"><img src="{{ asset('img/1559813360b4.jpg') }}" class="img-circle" alt="User Image" width="100px" height="100px" style="margin-top:10px"></label>
                                    <input type="file" name="image" id="upload" class="hidden">
                                    <button style=" position: absolute;right:20px" class="btn-primary">Luu</button>
                                </form>
                                <span style="color:red">{{ isset($errfile) ? $errfile : "" }}</span>

                                <p style="margin-top:0px !important">
                                    {{ Auth::user()->name }} - Web Developer
                                    <small>Member since Nov. 2012</small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                <div class="row">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                <a href="{{ url('user/'.Auth::user()->id.'/edit') }}" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    {{-- <a href="{{ route('logout')}}" class="btn btn-default btn-flat">Sign out</a> --}}
                                    {<a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                     {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <aside class="main-sidebar" style="background:black">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
              <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="{{ asset('img/1559813360b4.jpg') }}" class="img-circle" alt="User Image" style="height:45px !important">
                    </div>
                    <div class="pull-left info">
                        <p class="color-white">{{ Auth::user()->name }}</p>
                        <a href="#"><i class="fa fa-circle text-success"></i>{{ __('Online') }} </a>
                    </div>
                </div>
             
              <!-- /.search form -->
              <!-- sidebar menu: : style can be found in sidebar.less -->
              <ul class="sidebar-menu" data-widget="tree">
                <li class="active">
                <a href="{{ url('dashboard') }}">
                    <i class="fa fa-dashboard"></i> <span>{{ __('Dashboard') }}</span>
                  </a>
                </li> 
                <li class="">            
                    <a href="{{ url('dashboard/role') }}">
                      <i class="fa fa-pie-chart"></i> <span>{{ __('Roles & Permissions') }}</span>
                    </a>
                  </li> 
                <li class="">            
                  <a href="{{ url('dashboard/admin') }}">
                    <i class="fa fa-address-book-o"></i> <span>{{ __('Admin') }}</span>
                  </a>
                </li>

                <li class="">            
                    <a href="{{ url('dashboard/user') }}">
                        <i class="fa fa-users"></i> <span>{{ __('Users') }}</span>
                    </a>
                </li>

                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-edit"></i> <span>{{ __('Blog') }}</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    @can('before', App\Post::class)
                    <li><a href="{{ url('dashboard/post') }}"><i class="fa fa-circle-o"></i> {{ __('Post') }}</a></li>
                    @endcan
                    <li><a href="{{ url('dashboard/category') }}"><i class="fa fa-circle-o"></i>{{ __('Category') }}</a></li>
                    <li><a href="{{ url('dashboard/tag') }}"><i class="fa fa-circle-o"></i>{{ __('Tag') }}</a></li>
                  </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-cogs"></i> <span>{{ __('Setting') }}</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i>{{ __('General') }}</a></li>
                        <li><a href="{{ url('dashboard/options-restricted') }}"><i class="fa fa-circle-o"></i> {{ __('Restricted') }}</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i>{{ __('Media') }}</a></li>
                    </ul>
                </li>

                <li class="header">{{ __('LABELS') }}</li>
                <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>{{ __('Important') }}</span></a></li>
                <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>{{ __('Warning') }}</span></a></li>
                <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>{{ __('Information') }}</span></a></li>
              </ul>
            </section>
            <!-- /.sidebar -->
          </aside>        
    @yield('content')
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.4.0
        </div>
        <strong>Copyright © 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
        reserved.
    </footer>
    @stack('scripts')
       <script src="{{ asset('js/jquery/theme.js') }}"></script>
</body>
</html>
