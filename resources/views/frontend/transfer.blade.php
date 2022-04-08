@extends('frontend.layouts.app')
@section('title','Transfer')
@section('content')
    <div class="container transfer">
        <div class="card mt-3 border-0 shadow-sm border-radius">
            <div class="card-body">
                <form action="{{route('transfer.confirm')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>From</label>
                        <div class="d-md-flex">
                            <p class="text-muted mr-3 mb-1">{{$authUser->name}}</p>
                            <p class="text-muted">{{$authUser->phone}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>To ( Phone Number )</label>
                        <div class="">
                            <p class="account_owner"></p>
                            <div class="input-group">
                                <input type="number" class="form-control border-radius receiver_phone" name="receiver_phone" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <span class="btn btn-secondary border-radius verify_phone_btn"><i class="fas fa-check-circle"></i></span>
                                </div>
                            </div>
                            @error('receiver_phone')
                            <small class="text-danger font-weight-bold">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Amount ( MMK )</label>
                        <div class="">
                            <input type="number" class="form-control border-radius" name="amount" value="{{old('amount')}}">
                            @error('amount')
                            <small class="text-danger font-weight-bold">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <div class="d-md-flex">
                        <textarea name="desc" cols="10"
                                  rows="2" class="form-control border-radius"></textarea>
                        </div>
                    </div>
                    <button class="btn btn-primary border-radius w-100">Continue</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function (){
             $('.verify_phone_btn').on('click',function (){
                 var phone = $('.receiver_phone').val();
                 $.ajax({
                     url : '/receiver/phone/verify?phone='+phone,
                     type : 'GET',
                     success : function (res){
                         if (res.status == 'success'){
                             $('.account_owner').text('Account Owner : '+res.data['name']);
                             $('.account_owner').addClass('primary-color font-weight-bold');
                             $('.account_owner').removeClass('text-danger');
                             $('.verify_phone_btn').addClass('btn-primary');
                         }else {
                             $('.account_owner').text('Invalid Phone Number');
                             $('.account_owner').addClass('text-danger font-weight-bold');
                         }
                     }
                 })
             })
        })
    </script>
@endsection
