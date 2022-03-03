<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <title>Magic Pay</title>
    <link href="{{asset('backend/css/main.css')}}" rel="stylesheet"></head>
<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">

{{--    header start--}}
    @include('backend.layouts.header')
{{--    header end--}}

    <div class="app-main">

{{--        side bar start--}}
        @include('backend.layouts.sidebar')
{{--        side bar end--}}

        <div class="app-main__outer">
            <div class="app-main__inner">
                <div class="app-page-title">
                    <div class="page-title-wrapper">
                        <div class="page-title-heading">
                            <div class="page-title-icon">
                                <i class="@yield('icon','pe-7s-car') icon-gradient bg-mean-fruit">
                                </i>
                            </div>
                            <div>
                                @yield('content-title','Dashboard')
                            </div>
                        </div>
                    </div>
                </div>

{{--                content start--}}
                <div class="row">
                    @yield('content')
                </div>
{{--                content end--}}

            </div>

{{--                footer start--}}
            @include('backend.layouts.footer')
{{--            footer end--}}
        </div>
    </div>
</div>
<script type="text/javascript" src="{{asset('backend/js/main.js')}}"></script></body>
</html>
