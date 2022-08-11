<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

<link rel="stylesheet" href="{{asset('vendors/plugins/fontawesome-free/css/all.min.css')}}">

<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

<link rel="stylesheet" href="{{asset('vendors/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">

<link rel="stylesheet" href="{{asset('vendors/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">

<link rel="stylesheet" href="{{asset('vendors/plugins/jqvmap/jqvmap.min.css')}}">

<link rel="stylesheet" href="{{asset('vendors/dist/css/adminlte.min.css?v=3.2.0')}}">

<link rel="stylesheet" href="{{asset('vendors/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">

<link rel="stylesheet" href="{{asset('vendors/plugins/daterangepicker/daterangepicker.css')}}">

<link rel="stylesheet" href="{{asset('vendors/plugins/summernote/summernote-bs4.min.css')}}">
<script nonce="e85cef65-79e8-46da-91db-14e775014d86">(function(w,d){!function(a,e,t,r){a.zarazData=a.zarazData||{};a.zarazData.executed=[];a.zaraz={deferred:[]};a.zaraz.q=[];a.zaraz._f=function(e){return function(){var t=Array.prototype.slice.call(arguments);a.zaraz.q.push({m:e,a:t})}};for(const e of["track","set","ecommerce","debug"])a.zaraz[e]=a.zaraz._f(e);a.zaraz.init=()=>{var t=e.getElementsByTagName(r)[0],z=e.createElement(r),n=e.getElementsByTagName("title")[0];n&&(a.zarazData.t=e.getElementsByTagName("title")[0].text);a.zarazData.x=Math.random();a.zarazData.w=a.screen.width;a.zarazData.h=a.screen.height;a.zarazData.j=a.innerHeight;a.zarazData.e=a.innerWidth;a.zarazData.l=a.location.href;a.zarazData.r=e.referrer;a.zarazData.k=a.screen.colorDepth;a.zarazData.n=e.characterSet;a.zarazData.o=(new Date).getTimezoneOffset();a.zarazData.q=[];for(;a.zaraz.q.length;){const e=a.zaraz.q.shift();a.zarazData.q.push(e)}z.defer=!0;for(const e of[localStorage,sessionStorage])Object.keys(e||{}).filter((a=>a.startsWith("_zaraz_"))).forEach((t=>{try{a.zarazData["z_"+t.slice(7)]=JSON.parse(e.getItem(t))}catch{a.zarazData["z_"+t.slice(7)]=e.getItem(t)}}));z.referrerPolicy="origin";z.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(a.zarazData)));t.parentNode.insertBefore(z,t)};["complete","interactive"].includes(e.readyState)?zaraz.init():a.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,0,"script");})(window,document);</script></head>
<body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            {{--<div
                class="preloader flex-column justify-content-center align-items-center"
            >
                <img
                    class="animation__shake"
                    src="{{asset('vendors/dist/img/AdminLTELogo.png')}}"
                    alt="AdminLTELogo"
                    height="60"
                    width="60"
                />
            </div>--}}

            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            data-widget="pushmenu"
                            href="#"
                            role="button"
                            ><i class="fas fa-bars"></i
                        ></a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="index3.html" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="#" class="nav-link">Contact</a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            data-widget="navbar-search"
                            href="#"
                            role="button"
                        >
                            <i class="fas fa-search"></i>
                        </a>
                        <div class="navbar-search-block">
                            <form class="form-inline">
                                <div class="input-group input-group-sm">
                                    <input
                                        class="form-control form-control-navbar"
                                        type="search"
                                        placeholder="Search"
                                        aria-label="Search"
                                    />
                                    <div class="input-group-append">
                                        <button
                                            class="btn btn-navbar"
                                            type="submit"
                                        >
                                            <i class="fas fa-search"></i>
                                        </button>
                                        <button
                                            class="btn btn-navbar"
                                            type="button"
                                            data-widget="navbar-search"
                                        >
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>


                </ul>
            </nav>

            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <a href="index3.html" class="brand-link">
                    <img
                        src="{{asset('vendors/dist/img/AdminLTELogo.png')}}"
                        alt="AdminLTE Logo"
                        class="brand-image img-circle elevation-3"
                        style="opacity: 0.8"
                    />
                    <span class="brand-text font-weight-light">AdminLTE 3</span>
                </a>

                <div class="sidebar">
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img
                                src="{{asset('vendors/dist/img/user2-160x160.jpg')}}"
                                class="img-circle elevation-2"
                                alt="User Image"
                            />
                        </div>
                        <div class="info">
                            <a href="#" class="d-block">Alexander Pierce</a>
                        </div>
                    </div>
                    <nav class="mt-2">
                        <ul
                            class="nav nav-pills nav-sidebar flex-column"
                            data-widget="treeview"
                            role="menu"
                            data-accordion="false"
                        >
                            <li class="nav-item menu-open">
                                <a href="#" class="nav-link active">
                                    <p>
                                        Questions                                        
                                    </p>
                                </a>

                    </nav>
                </div>
            </aside>

            @yield('content')


            <aside class="control-sidebar control-sidebar-dark"></aside>
        </div>

        <script src="{{asset('vendors/plugins/jquery/jquery.min.js')}}"></script>

        <script src="{{asset('vendors/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

        <script>
            $.widget.bridge("uibutton", $.ui.button);
        </script>

        <script src="{{asset('vendors/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

        <script src="{{asset('vendors/plugins/chart.js/Chart.min.js')}}"></script>

        <script src="{{asset('vendors/plugins/sparklines/sparkline.js')}}"></script>

        <script src="{{asset('vendors/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
        <script src="{{asset('vendors/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>

        <script src="{{asset('vendors/plugins/jquery-knob/jquery.knob.min.js')}}"></script>

        <script src="{{asset('vendors/plugins/moment/moment.min.js')}}"></script>
        <script src="{{asset('vendors/plugins/daterangepicker/daterangepicker.js')}}"></script>

        <script src="{{asset('vendors/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>

        <script src="{{asset('vendors/plugins/summernote/summernote-bs4.min.js')}}"></script>

        <script src="{{asset('vendors/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>

        <script src="{{asset('vendors/dist/js/adminlte.js?v=3.2.0')}}"></script>

        <script src="{{asset('vendors/dist/js/demo.js')}}"></script>

        <script src="{{asset('vendors/dist/js/pages/dashboard.js')}}"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    </body>
</html>