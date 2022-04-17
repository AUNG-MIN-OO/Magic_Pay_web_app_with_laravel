@extends('frontend.layouts.app')
@section('title','Magic Pay')
@section('content')
    <div class="home mt-3">
        <div class="home-header">
            <div class="home-profile-img text-center">
                <img class="" src="https://ui-avatars.com/api/?background=775ada&color=fff&name={{auth()->user()->name}}" alt="">
            </div>
            <div class="">
                <h6 class="text-muted text-center mb-0 mt-3">Account Balance</h6>
                <h5 class="font-weight-bold mb-0 text-center">{{number_format($user->wallet->amount)}} MMK</h5>
            </div>
        </div>
        <div class="home-content">
            <div class="container">
                <div class="row my-3 home-content-card">
                    <div class="col-6">
                        <a href="">
                            <div class="card border-0 shadow-sm border-radius">
                                <div class="card-body text-center">
                                    <img src="{{asset('frontend/image/scanner.svg')}}" alt="" class="qr-scan-home mr-md-3">
                                    <span>Scan & Pay</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="">
                            <div class="card border-0 shadow-sm border-radius qr-code-home-card">
                                <div class="card-body text-center">
                                    <img src="{{asset('frontend/image/qr_code.svg')}}" alt="" class="qr-code-home mr-md-3">
                                    <span>Show QR</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="home-content-menu pb-3">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <a href="{{route('transfer')}}">
                                <div class="card border-0 shadow-sm border-radius mt-3">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex justify-content-center align-items-center">
                                            <span class="home-content-menu-icon">
                                                <img src="{{asset('frontend/image/transfer.png')}}" alt="">
                                            </span>
                                                <span class="mb-0 font-weight-bold ml-2">Transfer Money</span>
                                            </div>
                                            <span>
                                            <i class="fas fa-chevron-right"></i>
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card border-0 shadow-sm border-radius mt-3">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <span class="home-content-menu-icon">
                                                <img src="{{asset('frontend/image/wallet (1).png')}}" alt="">
                                            </span>
                                            <span class="mb-0 font-weight-bold ml-2">My Wallet</span>
                                        </div>
                                        <span>
                                            <i class="fas fa-chevron-right"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <a href="{{route('transaction')}}">
                                <div class="card border-0 shadow-sm border-radius mt-3">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex justify-content-center align-items-center">
                                            <span class="home-content-menu-icon">
                                                <img src="{{asset('frontend/image/transactional-data.png')}}" alt="">
                                            </span>
                                                <span class="mb-0 font-weight-bold ml-2">Transaction History</span>
                                            </div>
                                            <span>
                                            <i class="fas fa-chevron-right"></i>
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
