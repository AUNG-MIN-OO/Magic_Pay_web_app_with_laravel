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
                        <div class="d-md-flex">
                            <input type="number" class="form-control border-radius" name="receiver_phone" value="{{old('receiver_phone')}}">
                            @error('receiver_phone')
                            <small class="text-danger font-weight-bold">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Amount ( MMK )</label>
                        <div class="d-md-flex">
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
