<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>{{ config('app.name', 'Laravel')}} | @yield('title')</title>
    <!-- Font Awesome Icons -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- page css -->
    @yield('css')
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to to the body tag
to get the desired effect
|---------------------------------------------------------|
|LAYOUT OPTIONS | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->

<body class="hold-transition sidebar-mini layout-navbar-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i class="fas fa-th-large"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="brand-link">
                <img src="{{asset('assets/images/logo.png')}}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">{{ config('app.short', 'SAW.Apps') }}</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link {{ set_active(['home', '/home'])}}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Home
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">PERHITUNGAN</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-calendar-alt"></i>
                                <p>
                                    Normalisasi
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-image"></i>
                                <p>
                                    Hasil Akhir
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">DATA MASTER</li>
                        <li class="nav-item has-treeview {{ set_active(['mahasiswa','mahasiswa.tambah'], 'menu-open') }}">
                            <a href="{{ route('mahasiswa') }}" class="nav-link {{ set_active(['mahasiswa', 'mahasiswa.tambah', 'mahasiswa.edit'])}}">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Mahasiswa</p>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('mahasiswa') }}" class="nav-link {{ set_active('mahasiswa') }}">
                                        <i class="nav-icon far fa-eye"></i>
                                        <p>Lihat Data</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('mahasiswa.tambah') }}" class="nav-link {{ set_active('mahasiswa.tambah') }}">
                                        <i class="nav-icon fas fa-plus"></i>
                                        <p>Tambah Data</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview {{ set_active(['kriteria','kriteria.tambah'], 'menu-open') }}">
                            <a href="{{ route('kriteria') }}" class="nav-link {{ set_active(['kriteria', 'kriteria.tambah', 'kriteria.edit'])}}">
                                <i class="nav-icon fas fa-th-list"></i>
                                <p>Kriteria</p>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('kriteria') }}" class="nav-link {{ set_active('kriteria') }}">
                                        <i class="nav-icon far fa-eye"></i>
                                        <p>Lihat Data</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('kriteria.tambah') }}" class="nav-link {{ set_active('kriteria.tambah') }}">
                                        <i class="nav-icon fas fa-plus"></i>
                                        <p>Tambah Data</p>
                                    </a>
                                </li>
                            </ul>
                        <li class="nav-item">
                            <a href="{{ route('nilai') }}" class="nav-link {{ set_active('nilai') }}">
                                <i class="nav-icon fas fa-calculator"></i>
                                <p>Nilai</p>
                            </a>
                        </li>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>