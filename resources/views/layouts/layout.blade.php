<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Bootstrap 3.3.7 -->
    <link href="https://unpkg.com/ionicons@4.5.5/dist/css/ionicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <!-- Styles -->
    @stack('head')
</head>

<body>
    <header class="main-header">
        <!-- Logo -->
        <a href="{{ url('index') }}" class="logo">
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
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope"></i>
                            <span class="label label-success">4</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 4 messages</li>
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
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ asset(Auth::user()->image) }}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <form action="{{ route('upload',Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <label for="upload"><img src="{{ asset(Auth::user()->image) }}" class="img-circle" alt="User Image" width="100px" height="100px" style="margin-top:10px"></label>
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
    <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
              <!-- Sidebar user panel -->
              <div class="user-panel">
                <div class="pull-left image">
                  <img src="{{ asset(Auth::user()->image) }}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                  <p>Alexander Pierce</p>
                  <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
              </div>
             
              <!-- /.search form -->
              <!-- sidebar menu: : style can be found in sidebar.less -->
              <ul class="sidebar-menu" data-widget="tree">
                <li class="active">
                <a href="{{ url('index') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                  </a>
                </li> 
                <li class="">            
                    <a href="{{ url('role') }}">
                      <i class="fa fa-pie-chart"></i> <span>Role</span>
                    </a>
                  </li> 
                <li class="">            
                  <a href="{{ url('listtask') }}">
                    <i class="fa fa-address-book-o"></i> <span>Lists</span>
                  </a>
                </li>

                <li class="">            
                    <a href="{{ url('user') }}">
                        <i class="fa fa-laptop"></i> <span>Users</span>
                    </a>
                    </li> 
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-edit"></i> <span>Tasks</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="{{ url('task') }}"><i class="fa fa-circle-o"></i> Tasks</a></li>
                    <li><a href="{{ url('comment') }}"><i class="fa fa-circle-o"></i> Comments</a></li>
                    <li><a href="{{ url('attachment') }}"><i class="fa fa-circle-o"></i> Attachments</a></li>
                    <li><a href="{{ url('checklist') }}"><i class="fa fa-circle-o"></i> Checklists</a></li>
                    <li><a href="{{ url('label') }}"><i class="fa fa-circle-o"></i> Labels</a></li>
                  </ul>
                </li>

                <li class="header">LABELS</li>
                <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
                <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
                <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
              </ul>
            </section>
            <!-- /.sidebar -->
          </aside>        
    @yield('content')
    @stack('scripts')
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.4.0
        </div>
        <strong>Copyright © 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
        reserved.
    </footer>
</body>
</html>
