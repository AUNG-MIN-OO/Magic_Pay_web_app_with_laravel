@extends('backend.layouts.app')
@section('admin-user-create-active','mm-active')
@section('icon','pe-7s-add-user')
@section('content-title','Add New Admin')
@section('styles')
@endsection
@section('content')
    <div class="col-12 col-md-6">
        <div class="card">
            <div class="card-body">
                @include('backend.layouts.flash')
                <form action="{{route('admin.admin-user.store')}}" method="post" id="admin_create">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control">
                        @error('name')
                            <small class="text-danger font-weight-bolder">{{"*".$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control">
                        @error('email')
                        <small class="text-danger font-weight-bolder">{{"*".$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="number" name="phone" class="form-control">
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
    {!! JsValidator::formRequest('App\Http\Requests\StoreAdminUser', '#admin_create') !!}
    <script>
        $(document).ready(function() {

        } );
    </script>
@endsection

