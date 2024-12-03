<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  {{-- <title>AdminLTE 3 | Dashboard 3</title> --}}
  @stack('title')
  @stack('styles')

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{url('admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('admin/dist/css/adminlte.min.css')}}">

  <link rel="stylesheet" href="{{url('admin/dist/css/form.css')}}">

  {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- for datatble start --}}

    {{-- datatable end --}}
    <style>
        /* Style for square radio buttons */
        .form-check-input[type="radio"] {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            width: 15px;
            height: 15px;
            border: 2px solid #ccc;
            border-radius: 0;
            outline: none;
            cursor: pointer;
            margin-right: 5px;
        }

        .form-check-input[type="radio"]:checked {
            background-color: #007bff;
        }

        .form-check-label {
            margin-bottom: 0;
        }

    </style>
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini" >

<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="" class="nav-link">Home</a>
      </li>
      {{-- <li class="nav-item d-none d-sm-inline-block">
        <a href="" class="nav-link">Add JobCard</a>
      </li> --}}



    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <li class="nav-item">
            {{-- <a class="nav-link" data-widget="fullscreen" href="#" role="button">
              <i class="fas fa-expand-arrows-alt"></i>
            </a> --}}
            {{-- <button type="button" class="btn btn-primary logout">Logout</button> --}}
            <a href="{{url('/logout')}}" class="btn btn-primary btn-md">Logout</a>
        </li>

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" >
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="{{url('admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Fig</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{url('admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        {{-- <div class="info">
          <a href="#" class="d-block text-capitalize">{{\Auth::user()->name}}</a>
        </div> --}}
        @if(Auth::check() && \Auth::user()->name)

            <div class="info">
                <a href="#" class="d-block text-capitalize">{{\Auth::user()->name}}</a>
            </div>
        @else
            @php
                return view('login');
            @endphp

        @endif
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
              {{-- <li class="nav-item menu-open {{ request()->is('home') ? 'menu-open' : '' }}">
                <a href="{{url('/home')}}" class="nav-link {{request()->is('home') ? 'active' : ''}}">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                   
                  </p>
                </a>

              </li> --}} 
              <li class="nav-item menu-open {{ request()->routeIs('loan.dashboard') ? 'menu-open' : '' }}">
                <a href="{{ route('loan.dashboard') }}" class="nav-link {{ request()->routeIs('loan.dashboard') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>

                {{-- user start --}}
              <li class="nav-item {{ request()->is('document/add','viewappliation') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ request()->is('office/add','viewappliation') ? 'active' : '' }}">
                  {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
                  <i class="nav-icon fa fa-user"></i>
                  <p>
                    Application Form
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview ">
                  <li class="nav-item ">
                    <a href="{{url('office/add')}}" class="nav-link {{ request()->is('office/add') ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{route('viewapplication')}}" class="nav-link {{ request()->is('viewappliation') ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View</p>
                    </a>
                  </li>

                </ul>
              </li> 

              <li class="nav-item {{ request()->is('document/add','viewdocument') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ request()->is('document/add','viewdocument') ? 'active' : '' }}">
                  {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
                  <i class="fa fa-file"></i>
                  <p>
                    Document Uplod
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview ">
                  <li class="nav-item ">
                    <a href="{{url('document/add')}}" class="nav-link {{ request()->is('document/add') ? 'active' : '' }}">
                      <i class="fa fa-book"></i>
                      <p>Add</p>
                    </a>
                  </li> 

                  <li class="nav-item">
                    <a href="{{route('viewdocument')}}" class="nav-link {{ request()->is('viewdocument') ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View</p>
                    </a>
                  </li>

                  

                </ul>
              </li> 

              <li class="nav-item {{ request()->is('cam/add','viewcam') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ request()->is('cam/add','viewcam') ? 'active' : '' }}">
                  
                  <i class="fa fa-file"></i>
                  <p>
                    CAM Stage
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview ">
                  <li class="nav-item ">
                    <a href="{{url('cam/add')}}" class="nav-link {{ request()->is('cam/add') ? 'active' : '' }}">
                      <i class="fa fa-book"></i>
                      <p>Add</p>
                    </a>
                  </li> 

                  <li class="nav-item">
                    <a href="{{route('viewcam')}}" class="nav-link {{ request()->is('viewcam') ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View</p>
                    </a>
                  </li> 

                  

                </ul>
              </li> 

              <li class="nav-item {{ request()->is('credit/add','viewcredit') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ request()->is('credit/add','viewcredit') ? 'active' : '' }}">
                  
                  <i class="fa fa-file"></i>
                  <p>
                    Credit Stage
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview ">
                  <li class="nav-item ">
                    <a href="{{url('credit/add')}}" class="nav-link {{ request()->is('credit/add') ? 'active' : '' }}">
                      <i class="fa fa-book"></i>
                      <p>Add</p>
                    </a>
                  </li> 

                  {{-- <li class="nav-item">
                    <a href="{{route('viewcam')}}" class="nav-link {{ request()->is('viewcam') ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View</p>
                    </a>
                  </li> --}}

                  

                </ul>
              </li>
              {{-- aproved stage start--}}
              <li class="nav-item {{ request()->is('approved/add','viewapproved') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ request()->is('approved/add','viewapproved') ? 'active' : '' }}">
                  
                  <i class="fa fa-file"></i>
                  <p>
                    Approved Stage
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview ">
                  <li class="nav-item ">
                    <a href="{{url('approved/add')}}" class="nav-link {{ request()->is('approved/add') ? 'active' : '' }}">
                      <i class="fa fa-book"></i>
                      <p>Add</p>
                    </a>
                  </li>  

                  <li class="nav-item ">
                    <a href="{{url('approved/disbursal')}}" class="nav-link {{ request()->is('approved/disbursal') ? 'active' : '' }}">
                      <i class="fa fa-book"></i>
                      <p>Disbursal Details</p>
                    </a>
                  </li> 

                  <li class="nav-item">
                    <a href="{{route('viewapproved')}}" class="nav-link {{ request()->is('viewapproved') ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View</p>
                    </a>
                  </li> 

                  

                </ul>
              </li> 
              {{-- approved stage end --}}

              {{-- user start --}}
              <li class="nav-item {{ request()->is('adduser', 'alluser') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ request()->is('adduser', 'alluser') ? 'active' : '' }}">
                  {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
                  <i class="nav-icon fa fa-user"></i>
                  <p>
                    All User
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{url('/adduser')}}" class="nav-link {{ request()->is('adduser') ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('alluser')}}" class="nav-link {{ request()->is('alluser') ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View</p>
                    </a>
                  </li>
                  {{-- <li class="nav-item">
                    <a href="" class="nav-link ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Trash</p>
                    </a>
                  </li> --}}

                </ul>
              </li>
              {{-- user end --}}

              {{-- role start --}}
              <li class="nav-item {{ request()->is('role/add', 'role') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ request()->is('role', 'role/add') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-solid fa-users"></i>
                  <p>
                    Role
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{url('/role/add')}}" class="nav-link {{ request()->is('role/add') ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('allroles')}}" class="nav-link {{ request()->is('role') ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View</p>
                    </a>
                  </li>

                </ul>
              </li>
              {{-- role end --}}

            {{-- permission start --}}
              <li class="nav-item {{request()->is('permission/add','permission') ? 'menu-open' : ''}}">
                <a href="#" class="nav-link {{request()->is('permission/add','permission') ? 'active' : ''}}">
                  <i class="nav-icon fas fa-user-shield"></i>
                  <p>
                    Permission
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{url('/permission/add')}}" class="nav-link {{request()->is('permission/add') ? 'active' : ''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('allpermission')}}" class="nav-link {{request()->is('permission') ? 'active' : ''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View</p>
                    </a>
                  </li>

                </ul>
              </li>
            {{-- permission end --}}

            </ul>
          </nav>
          <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


