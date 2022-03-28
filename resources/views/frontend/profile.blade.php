@extends('frontend.layouts.app')
@section('title','Profile')
@section('content')
<div class="profile">
    <div class="profile-img">
        <div class="d-flex justify-content-center" style="height: 100px">
            <img class="mt-3" src="https://ui-avatars.com/api/?background=775ada&color=fff&name={{auth()->user()->name}}" alt="">
            <a href="#" class="edit-profile-photo"><i class="fas fa-edit text-white"></i></a>
        </div>
        <h5 class="mb-0 mt-3 text-center font-weight-bold">{{auth()->user()->name}}</h5>
        <p class="mb-0 text-center text-muted">{{auth()->user()->phone}}</p>
    </div>
    <div class="container">
        <div class="profile-content">
            <a href="">
                <div class="mt-3 d-flex justify-content-between align-items-center profile-content-buttons">
                    <span>
                        <i class="fas fa-user-edit mr-2"></i>
                        <p class="d-inline">Edit User Information</p>
                    </span>
                        <span>
                        <i class="fas fa-chevron-right inline"></i>
                    </span>
                </div>
            </a>
            <a href="{{route('update.password')}}">
                <div class="mt-1 d-flex justify-content-between align-items-center profile-content-buttons">
                    <span>
                        <i class="fas fa-eye mr-2"></i>
                        <p class="d-inline">Update Password</p>
                    </span>
                    <span>
                        <i class="fas fa-chevron-right inline"></i>
                    </span>
                </div>
            </a>
            <a href="">
                <div class="mt-1 d-flex justify-content-between align-items-center profile-content-buttons logout">
                    <span>
                        <i class="fas fa-sign-out-alt mr-2"></i>
                        <p class="d-inline">Sign Out</p>
                    </span>
                    <span>
                        <i class="fas fa-chevron-right inline"></i>
                    </span>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script>
        $(document).on('click','.logout', function (e){
            e.preventDefault();

            Swal.fire({
                title: 'Are you sure to logout?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#775ada',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm',
                reverseButtons : true,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url : "{{route('logout')}}",
                        type : 'post',
                        success : function (res){
                            console.log(res);
                            window.location.replace("{{route('login')}}");
                        }
                    })
                }
            })

        })
    </script>
@endsection
