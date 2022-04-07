@extends('frontend.layouts.app')
@section('title','Confirmation')
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
                        <label>To</label>
                        <div class="d-md-flex">
{{--                            <p class="text-muted mr-3 mb-1"></p>--}}
                            <p class="text-muted">{{$authUser->phone}}</p>
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
                    <button class="btn btn-primary border-radius w-100">Confirm</button>
                </form>
            </div>
        </div>
    </div>
@endsection
