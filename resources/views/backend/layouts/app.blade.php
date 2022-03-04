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
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Magic Pay</title>
    <link href="{{asset('backend/css/main.css')}}" rel="stylesheet">
{{--    datatable css--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('backend/css/style.css')}}">
@yield('styles')
</head>
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
{{--datatable js--}}
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

{{--js validation--}}
<script type="text/javascript" src="{{ url('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

{{--sweetalert 2--}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@yield('scripts')
<script>

    $(document).ready(function (){
        let token = document.head.querySelector('meta[name="csrf-token"]');
        if (token){
            $.ajaxSetup({
                headers : {
                    'X-CSRF_TOKEN' : token.content
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
    })

</script>

</html>
