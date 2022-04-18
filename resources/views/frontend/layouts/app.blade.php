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
    {{--    date picker--}}
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    @yield('styles')
</head>
<body class="background-color">
<div id="app">
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
                            <a href="{{route('transaction')}}">
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
{{--jscroll--}}
<script src="{{asset('frontend/js/jscroll.min.js')}}"></script>
{{--date picker--}}
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
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
