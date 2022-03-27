@extends('backend.layouts.app')
@section('user-edit-active','mm-active')
@section('icon','pe-7s-note')
@section('content-title','Edit User')
@section('styles')
@endsection
@section('content')
    <div class="col-12 col-md-6">
        <div class="card">
            <div class="card-body">
                @include('backend.layouts.flash')
                <form action="{{route('admin.user.update',$user->id)}}" method="post" id="admin_update">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{$user->name}}">
                        @error('name')
                        <small class="text-danger font-weight-bolder">{{"*".$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" value="{{$user->email}}">
                        @error('email')
                        <small class="text-danger font-weight-bolder">{{"*".$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="number" name="phone" class="form-control" value="{{$user->phone}}">
                        @error('phone')
                        <small class="text-danger font-weight-bolder">{{"*".$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control">
                        @error('password')
                        <small class="text-danger font-weight-bolder">{{"*".$message}}</small>
                        @enderror
                    </div>
                    <div class="float-right">
                        <button class="btn btn-secondary">Cancel</button>
                        <button type="submit" class="btn btn-primary">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\UpdateUser', '#admin_update') !!}
    <script>
        $(document).ready(function() {

        } );
    </script>
@endsection

