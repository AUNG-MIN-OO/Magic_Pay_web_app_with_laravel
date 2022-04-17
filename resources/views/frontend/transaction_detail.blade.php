@extends('frontend.layouts.app')
@section('title','Transaction Detail')
@section('content')
    <div class="container">
        <div class="transaction-detail" style="margin-bottom: 6rem!important;">
            <div class="transaction-detail-header my-4">
                <div class="d-flex justify-content-center align-items-center">
                    <h3 class="text-center {{$transaction->type == 1 ? "primary-color" : "text-danger"}}"><strong>{{$transaction->type == 1 ? "+" : "-"}} {{number_format($transaction->amount)}}</strong></h3>
                    <span class="{{$transaction->type == 1 ? "primary-color" : "text-danger"}}">.00 MMK</span>
                </div>
                <p class="text-center font-weight-bold text-uppercase mb-0 {{$transaction->type == 1 ? "primary-color" : "text-danger"}}">{{$transaction->type == 1 ? "income" : "expense"}}</p>
            </div>
            @if(session('transfer_success'))
                <div class="alert alert-success alert-dismissible fade show border-radius text-center" role="alert">
                    {{session('transfer_success')}}
                </div>
            @endif
            <div class="transaction-detail-body">
                <div class="transaction-detail-body_icon d-flex justify-content-center align-items-center">
                    <div class="transaction-detail-body_icon_line"></div>
                    <div class="mx-3">
                        <img src="{{asset('frontend/image/transfer.png')}}" alt="" style="width: 45px">
                    </div>
                    <div class="transaction-detail-body_icon_line"></div>
                </div>
                <div class="card border-0 border-radius shadow-sm mt-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="mb-0">Trx ID</p>
                            <p class="font-weight-bold mb-0">{{$transaction->trx_id}}</p>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="mb-0">Ref Num</p>
                            <p class="font-weight-bold mb-0">{{$transaction->ref_nbr}}</p>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="mb-0">{{$transaction->type == 1 ? "Sender" : "Receiver"}}'s Name</p>
                            <p class="font-weight-bold mb-0">{{$transaction->user->name}}</p>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="mb-0">Description</p>
                            <p class="font-weight-bold mb-0">{{$transaction->description}}</p>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="mb-0">Date</p>
                            <p class="font-weight-bold mb-0">{{$transaction->created_at->format("Y M d | H:i A")}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
