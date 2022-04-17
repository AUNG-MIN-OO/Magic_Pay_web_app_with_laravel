@extends('frontend.layouts.app')
@section('title','Wallet')
@section('content')
    <div class="container">
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
            @foreach($transaction as $trx)
                <a href="{{route('transaction.detail',$trx->trx_id)}}">
                    <div class="transaction-body d-flex justify-content-between align-items-center my-2">
                        <div class="d-flex justify-content-center align-items-center">
                    <span class="mr-2" style="width: 40px;height: 40px;background-color: {{$trx->type == 2 ? "#fff" : "var(--primary-color)"}};border-radius: 50%;display: flex; justify-content: center; align-items: center">
                        <i class="fas {{$trx->type == 2 ? "fa-chevron-up" : "fa-chevron-down"}}" style="color : {{$trx->type == 1 ? "#fff" : "var(--primary-color)"}};"></i>
                    </span>
                            <span>
                        <strong>{{$trx->user->name}}</strong>
                        <small class="mb-0 d-block">{{$trx->created_at->format("M d | H:i A")}}</small>
                    </span>
                        </div>
                        <span class="font-weight-bold {{$trx->type == 1 ? "" : "text-danger"}}">{{number_format($trx->amount)}} MMK</span>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
