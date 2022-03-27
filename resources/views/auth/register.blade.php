@extends('frontend.layouts.app_plain')
@section('title','Login')

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh">
            <div class="col-md-6">
                <div class="card rounded border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="text-uppercase text-center primary-color">Create an account</h3>
                        <p class="text-capitalize text-center">Welcome from Magic Pay</p>
                        <br>
                        <br>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group">
                                <div class="col-12 px-0">
                                    <input id="name" type="name" class="form-control border-radius background-color border-0 p1025 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus placeholder="User Name">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-12 px-0">
                                    <input id="email" type="email" class="form-control border-radius background-color border-0 p1025 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus placeholder="Email Address">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-12 px-0">
                                    <input id="phone" type="phone" class="form-control border-radius background-color border-0 p1025 @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autofocus placeholder="Phone Number">

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-12 px-0">
                                    <input id="password" type="password" class="form-control border-radius background-color border-0 p1025 @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus placeholder="Password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-12 px-0">
                                    <input id="password" type="password" class="form-control border-radius background-color border-0 p1025 @error('password_confirmation') is-invalid @enderror" name="password_confirmation" value="{{ old('password_confirmation') }}" required autocomplete="password_confirmation" autofocus placeholder="Confirm Password">

                                    @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>

                            <br>

                            <div class="form-group row mb-0">
                                <div class="col-12">
                                    <div class="d-flex justify-content-end align-items-center">
                                        <button type="submit" class="btn btn-primary border-radius p1035">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="d-flex justify-content-center align-items-center">
                            <br>
                            OR
                            <br>
                        </div>
                        <br>
                        <div class="">
                            <a href="{{route('login')}}" class="btn btn-primary border-radius p525 w-100 mb-2">
                                        <span>
                                            Already have an account?
                                        </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
