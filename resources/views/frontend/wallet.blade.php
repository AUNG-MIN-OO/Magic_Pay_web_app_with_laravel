@extends('frontend.layouts.app')
@section('title','Wallet')
@section('content')
    <div class="container wallet">
        <h4 class="mt-3"><strong>Hello {{$authUser->name}}</strong><i class="fas fa-hand-paper ml-2 primary-color"></i></h4>
        <div class="card border-radius mt-3">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="balance">
                        <p class="">{{$authUser->wallet ? substr_replace($authUser->wallet->account_number, str_repeat("X", 12), 0, 12) : '-'}}</p>
                    </div>
                </div>
                <br>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="balance">
                        <span>Balance</span>
                        <h5 class="">{{number_format($authUser->wallet ? $authUser->wallet->amount : 0)}} MMK</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="transaction mt-3">
            <div class="transaction-header d-flex justify-content-between align-items-center">
                <span>
                    <h5 class="font-weight-bold">Transactions</h5>
                </span>
                <span>
                    All
                    <i class="fas fa-chevron-down"></i>
                </span>
            </div>
            <div class="transaction-body d-flex justify-content-between align-items-center my-2">
                <div class="d-flex justify-content-center align-items-center">
                    <span class="mr-2" style="width: 40px;height: 40px;background-color: var(--primary-color);border-radius: 50%;display: flex; justify-content: center; align-items: center">
                        <i class="fas fa-chevron-up" style="color: #fff;"></i>
                    </span>
                    <span>
                        <strong>To Customer</strong>
                        <p class="mb-0">13:05PM</p>
                    </span>
                </div>
                <span class="font-weight-bold">5500 MMK</span>
            </div>
            <div class="transaction-body d-flex justify-content-between align-items-center my-2">
                <div class="d-flex justify-content-center align-items-center">
                    <span class="mr-2" style="width: 40px;height: 40px;background-color: var(--primary-color);border-radius: 50%;display: flex; justify-content: center; align-items: center">
                        <i class="fas fa-chevron-up" style="color: #fff;"></i>
                    </span>
                    <span>
                        <strong>To Tom</strong>
                        <p class="mb-0">13:05PM</p>
                    </span>
                </div>
                <span class="font-weight-bold">5500 MMK</span>
            </div>
            <div class="transaction-body d-flex justify-content-between align-items-center my-2">
                <div class="d-flex justify-content-center align-items-center">
                    <span class="mr-2" style="width: 40px;height: 40px;background-color: var(--primary-color);border-radius: 50%;display: flex; justify-content: center; align-items: center">
                        <i class="fas fa-chevron-up" style="color: #fff;"></i>
                    </span>
                    <span>
                        <strong>To Jerry</strong>
                        <p class="mb-0">13:05PM</p>
                    </span>
                </div>
                <span class="font-weight-bold">5500 MMK</span>
            </div>
            <div class="transaction-body d-flex justify-content-between align-items-center my-2">
                <div class="d-flex justify-content-center align-items-center">
                    <span class="mr-2" style="width: 40px;height: 40px;background-color: #ffffff;border-radius: 50%;display: flex; justify-content: center; align-items: center">
                        <i class="fas fa-chevron-down" style="color: var(--primary-color);"></i>
                    </span>
                    <span>
                        <strong>From Rose</strong>
                        <p class="mb-0">13:05PM</p>
                    </span>
                </div>
                <span class="font-weight-bold">5500 MMK</span>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).on('click','.logout', function (e){
            e.preventDefault();

            Swal.fire({
                title: 'Are you sure to logout?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#775ada',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm',
                reverseButtons : true,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url : "{{route('logout')}}",
                        type : 'post',
                        success : function (res){
                            console.log(res);
                            window.location.replace("{{route('login')}}");
                        }
                    })
                }
            })

        })
    </script>
@endsection
