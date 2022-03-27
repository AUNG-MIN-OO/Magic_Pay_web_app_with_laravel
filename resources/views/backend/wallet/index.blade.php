@extends('backend.layouts.app')
@section('user-wallet-active','mm-active')
@section('icon','pe-7s-wallet')
@section('content-title','Users Wallet')
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
                        <th class="no-sort">account number</th>
                        <th class="no-sort">owner name</th>
                        <th class="no-sort">amount (MMK)</th>
                        <th class="no-sort">created date</th>
                        <th>updated date</th>
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
                "ajax": "/admin/wallet/datatable/ssd",
                "columns" : [
                    { data : 'account_number', name : 'account_number', sortable: false},
                    { data : 'owner_name', name : 'owner_name'},
                    { data : 'amount', name : 'amount'},
                    { data : 'created_at', name : 'created_at'},
                    { data : 'updated_at', name : 'updated_at'},
                ],
                order:[
                    [4,'desc']
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

