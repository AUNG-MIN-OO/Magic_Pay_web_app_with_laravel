@extends('backend.layouts.app')
@section('admin-user-active','mm-active')
@section('icon','pe-7s-users')
@section('content-title','Admin List')
@section('styles')
    <style>
        table tr th{
            text-transform: uppercase;
        }
    </style>
@endsection
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-dark table-striped table-hover table-bordered datatable">
                    <thead>
                        <tr>
                            <th>name</th>
                            <th>email</th>
                            <th>phone</th>
                            <th>ip</th>
                            <th>user agent</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            var table = $('.datatable').DataTable( {
                "processing": true,
                "serverSide": true,
                "ajax": "/admin/user/datatable/ssd",
                "columns" : [
                    { data : 'name', name : 'name'},
                    { data : 'email', name : 'email'},
                    { data : 'phone', name : 'phone'},
                    { data : 'ip', name : 'ip'},
                    { data : 'user_agent', name : 'user_agent'},
                    { data : 'action', name : 'action'},
                ]
            } );

            $(document).on('click','.delete-admin', function (e){
                e.preventDefault();

                var id = $(this).data('id');
                Swal.fire({
                    title: 'Are you sure to delete?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Confirm'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url : '/admin/user/'+id,
                            type : 'DELETE',
                            success : function (){
                                table.ajax.reload();
                            }
                        })
                    }
                })

            })
        } );
    </script>
@endsection

