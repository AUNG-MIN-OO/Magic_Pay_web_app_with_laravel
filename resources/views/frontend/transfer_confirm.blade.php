@extends('frontend.layouts.app')
@section('title','Confirmation')
@section('content')
    <div class="container transfer">
        <div class="card mt-3 border-0 shadow-sm border-radius">
            <div class="card-body">
                <form action="{{route('transfer.complete')}}" method="post" id="transfer_complete_form">
                    @csrf
                    @include('backend.layouts.flash')
                    <input type="hidden" value="{{$authUser}}" name="auth_user">
                    <input type="hidden" value="{{$receiver_phone}}" name="receiver_phone">
                    <input type="hidden" value="{{$amount}}" name="amount">
                    <input type="hidden" value="{{$desc}}" name="desc">

                    <div class="form-group">
                        <label>From</label>
                        <div class="">
                            <p class="text-muted mr-3 mb-1">Account Owner : {{$authUser->name}}</p>
                            <p class="text-muted">Phone Number : {{$authUser->phone}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>To</label>
                        <div class="">
                            <p class="text-muted mr-3 mb-1">Account Owner : {{$receiver_acc -> name}}</p>
                            <p class="text-muted">Phone Number : {{$receiver_phone}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Amount ( MMK )</label>
                        <div class="d-md-flex">
                            <p class="text-muted">{{$amount}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <div class="d-md-flex">
                            <p class="text-muted">{{$desc}}</p>
                        </div>
                    </div>
                    <button class="btn btn-primary border-radius w-100 confirm_btn">Confirm</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function (){
            $('.confirm_btn').on('click',function (e){
                e.preventDefault();
                Swal.fire({
                    title: 'Please fill your password to confirm.',
                    icon: 'info',
                    html: '<input type="password" name="password" class="form-control border-radius d-block text-center confirm_password" value="{{old('password')}}">',
                    showCancelButton: true,
                    confirmButtonText : 'Confirm',
                    cancelButtonText : 'Cancel',
                    reverseButtons : true,
                }).then((result)=>{
                    if (result.isConfirmed){
                        var password = $('.confirm_password').val();
                        $.ajax({
                            url : '/transfer/confirm/password?password='+password,
                            type : 'GET',
                            success : function (res){
                                if (res.status == 'success'){
                                    $('#transfer_complete_form').submit();
                                }else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: res.message,
                                    })
                                }
                            }
                        })
                    }
                })
            })
        })
    </script>
@endsection
