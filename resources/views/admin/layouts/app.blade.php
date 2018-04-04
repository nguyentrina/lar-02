<?php
/**
 * Created by: TriNQ
 * Date: 22-03-2018
 * Time: 9:27 AM
 */
?>
        <!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title') - Admin control panel</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/main-admincp.css')}}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}">
    <!-- Page specific css-->
</head>
<body class="app sidebar-mini rtl">
    @include('admin/shared/header')
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    @include('admin/shared/sidebar')
    <main class="app-content">
        @yield('main')
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{asset('js/plugins/pace.min.js')}}"></script>
    <!-- Page specific javascripts-->
    @yield('javascript')
</body>
</html>
