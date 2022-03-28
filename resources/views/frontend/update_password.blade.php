@extends('frontend.layouts.app')
@section('title','Profile')
@section('content')
    <div class="profile">
        <div class="update-password-img">
            <img src="{{asset('frontend/image/pass_chagnge.svg')}}" alt="">
        </div>
        <div class="container">
            <div class="update-password-content mt-3">
                @if($errors->has('fail'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $errors->first('fail') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <form method="POST" action="{{ route('update.password.store') }}">
                    @csrf
                    <div class="form-group">
                        <div class="col-12 px-0">
                            <input id="old_password" type="password" class="form-control border-radius border-0 p1025 @error('old_password') is-invalid @enderror" name="old_password" value="{{ old('old_password') }}" autofocus placeholder="Old Password">

                            @error('old_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12 px-0">
                            <input id="new_password" type="password" class="form-control border-radius border-0 p1025 @error('new_password') is-invalid @enderror" name="new_password" value="{{ old('new_password') }}" autofocus placeholder="New Password">

                            @error('new_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-12">
                            <div class="">
                                <button type="submit" class="w-100 btn btn-primary border-radius p1035">
                                    {{ __('Update') }}
                                </button>
                                <button type="submit" class="mt-2 w-100 btn btn-danger border-radius p1035">
                                    {{ __('Go Back') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
