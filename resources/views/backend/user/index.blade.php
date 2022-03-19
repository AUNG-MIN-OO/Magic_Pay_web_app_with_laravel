@extends('backend.layouts.app')
@section('user-active','mm-active')
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
                            <th class="no-sort">name</th>
                            <th class="no-sort">email</th>
                            <th class="no-sort">phone</th>
                            <th class="no-sort">ip</th>
                            <th class="no-sort">user agent</th>
                            <th class="no-sort">created date</th>
                            <th>updated date</th>
                            <th class="no-sort">action</th>
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
                    { data : 'name', name : 'name', sortable: false},
                    { data : 'email', name : 'email'},
                    { data : 'phone', name : 'phone'},
                    { data : 'ip_address', name : 'ip'},
                    { data : 'user_agent', name : 'user_agent'},
                    { data : 'created_at', name : 'created_at'},
                    { data : 'updated_at', name : 'updated_at'},
                    { data : 'action', name : 'action'},
                ],
                order:[
                  [6,'desc']
                ],
                columnDefs: [
                    {
                        targets: 'no-visible', visible: false
                    },
                    {
                        targets: 'no-search', searchable: false
                    },
                    {
                        targets: "no-sort", sortable: false
                    }
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
                            type : 'post',
                            data : {_method: 'delete'},
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

