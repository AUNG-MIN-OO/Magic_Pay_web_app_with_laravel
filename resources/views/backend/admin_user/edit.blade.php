@extends('backend.layouts.app')
@section('admin-user-edit-active','mm-active')
@section('icon','pe-7s-note')
@section('content-title','Edit Admin')
@section('styles')
@endsection
@section('content')
    <div class="col-12 col-md-6">
        <div class="card">
            <div class="card-body">
                @include('backend.layouts.flash')
                <form action="{{route('admin.user.update',$admin_user->id)}}" method="post" id="admin_update">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{$admin_user->name}}">
                        @error('name')
                        <small class="text-danger font-weight-bolder">{{"*".$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" value="{{$admin_user->email}}">
                        @error('email')
                        <small class="text-danger font-weight-bolder">{{"*".$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="number" name="phone" class="form-control" value="{{$admin_user->phone}}">
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
    {!! JsValidator::formRequest('App\Http\Requests\UpdateAdminUser', '#admin_update') !!}
    <script>
        $(document).ready(function() {

        } );
    </script>
@endsection

