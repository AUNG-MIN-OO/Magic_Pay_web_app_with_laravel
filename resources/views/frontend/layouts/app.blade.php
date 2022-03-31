<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>@yield('title')</title>
    {{--    bootstrap css --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    {{--    fontawesome--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <link rel="stylesheet" href="{{asset('frontend/style.css')}}">
    @yield('styles')
</head>
<body class="background-color">
<div id="app">
{{--    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">--}}
{{--        <div class="container">--}}
{{--            <a class="navbar-brand" href="{{ url('/') }}">--}}
{{--                {{ config('app.name', 'Laravel') }}--}}
{{--            </a>--}}
{{--            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">--}}
{{--                <span class="navbar-toggler-icon"></span>--}}
{{--            </button>--}}

{{--            <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
{{--                <!-- Left Side Of Navbar -->--}}
{{--                <ul class="navbar-nav mr-auto">--}}

{{--                </ul>--}}

{{--                <!-- Right Side Of Navbar -->--}}
{{--                <ul class="navbar-nav ml-auto">--}}
{{--                    <!-- Authentication Links -->--}}
{{--                    @guest--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
{{--                        </li>--}}
{{--                        @if (Route::has('register'))--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
{{--                            </li>--}}
{{--                        @endif--}}
{{--                    @else--}}
{{--                        <li class="nav-item dropdown">--}}
{{--                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                                {{ Auth::user()->name }}--}}
{{--                            </a>--}}

{{--                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
{{--                                <a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--                                   onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();">--}}
{{--                                    {{ __('Logout') }}--}}
{{--                                </a>--}}

{{--                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
{{--                                    @csrf--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                    @endguest--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </nav>--}}

    <div class="top-menu">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-2 text-center">
                            @if(!request()->is('/'))
                                <a href="" class="back-btn">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                            @endif
                        </div>
                        <div class="col-8 text-center">
                            <a href="">
                                <h3 class="mb-0 primary-color font-weight-bolder text-nowrap">@yield('title','Magic Pay')</h3>
                            </a>
                        </div>
                        <div class="col-2 text-center">
                            <a href="">
                                <i class="fas fa-bell"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 px-0">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <div class="bottom-menu">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="row">
                        <a href="" class="scan">
                            <div class="scan-icon">
                                <i class="fas fa-qrcode text-white"></i>
                            </div>
                        </a>
                        <div class="col-3 text-center">
                            <a href="{{route('home')}}">
                                <i class="fas fa-home"></i>
                                <p class="mb-0">home</p>
                            </a>
                        </div>
                        <div class="col-3 text-center">
                            <a href="{{route('wallet')}}">
                                <i class="fas fa-wallet"></i>
                                <p class="mb-0">wallet</p>
                            </a>
                        </div>
                        <div class="col-3 text-center">
                            <a href="{{route('home')}}">
                                <i class="fas fa-exchange-alt"></i>
                                <p class="mb-0">transaction</p>
                            </a>
                        </div>
                        <div class="col-3 text-center">
                            <a href="{{route('profile')}}">
                                <i class="fas fa-user-alt"></i>
                                <p class="mb-0">profile</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{--bootstrap js--}}
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
{{--sweetalert 2--}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function (){
        let token = document.head.querySelector('meta[name="csrf-token"]');
        if (token){
            $.ajaxSetup({
                headers : {
                    'X-CSRF_TOKEN' : token.content,
                    'Content-Type' : 'application/json',
                    'Accept' : 'application/json'
                }
            })
        }

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        @if(session('success'))

        Toast.fire({
            icon: 'success',
            title: '{{session('success')}}'
        })

        @endif

        $('.back-btn').on('click',function (e){
            e.preventDefault();
            window.history.go(-1);
        })
    })
</script>
@yield('scripts')
</body>
</html>
