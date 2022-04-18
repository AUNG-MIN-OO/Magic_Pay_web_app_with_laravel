@extends('frontend.layouts.app')
@section('title','Wallet')
@section('content')
    <div class="container">
        <div class="transaction mt-3" style="margin-bottom: 6rem">
            <h6><i class="fas fa-filter mr-2"></i>Filter By</h6>
            <div class="transaction-header d-md-flex justify-content-between align-items-center">
                <div class="input-group mb-3 mr-3">
                  <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Date</label>
                  </div>
                  <input type="text" value="{{request()->date ?? date('Y-m-d')}}" class="form-control date-picker">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Type</label>
                    </div>
                    <select class="custom-select p-1 px-4 type" id="inputGroupSelect01">
                        <option selected value="">All</option>
                        <option value="1" @if(request()->type==1) selected @endif>Inc</option>
                        <option value="2" @if(request()->type==2) selected @endif>Exp</option>
                    </select>
                </div>
            </div>
            <hr>
            <h6><i class="fas fa-exchange-alt mr-2"></i>Transactions</h6>
            <div class="infinite-scroll">
                @foreach($transaction as $trx)
                    <a href="{{route('transaction.detail',$trx->trx_id)}}">
                        <div class="transaction-body d-flex justify-content-between align-items-center mt-3">
                            <div class="d-flex justify-content-center align-items-center">
                                <span class="mr-2" style="width: 40px;height: 40px;background-color: {{$trx->type == 2 ? "#fff" : "var(--primary-color)"}};border-radius: 50%;display: flex; justify-content: center; align-items: center">
                                    <i class="fas {{$trx->type == 2 ? "fa-chevron-up" : "fa-chevron-down"}}" style="color : {{$trx->type == 1 ? "#fff" : "var(--primary-color)"}};"></i>
                                </span>
                                <span>
                                    <strong>{{$trx->user->name}}</strong>
                                    <small class="mb-0 d-block">{{$trx->created_at->format("M d | H:i A")}}</small>
                                </span>
                            </div>
                            <span class="font-weight-bold {{$trx->type == 1 ? "" : "text-danger"}}">{{number_format($trx->amount)}} MMK</span>
                        </div>
                    </a>
                @endforeach
                {{ $transaction->links() }}
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function (){
            $('ul.pagination').hide();
            $(function() {
                $('.infinite-scroll').jscroll({
                    autoTrigger: true,
                    loadingHtml: '<div class="text-center"><img src="{{asset('frontend/image/loading.gif')}}" alt="Loading..." style="width:50px;height:50px;border-radius:50%;"/></div>',
                    padding: 0,
                    nextSelector: '.pagination li.active + li a',
                    contentSelector: 'div.infinite-scroll',
                    callback: function() {
                        $('ul.pagination').remove();
                    }
                });
            });

            $('.type').on('change',function (){
                var date = $('.date-picker').val();
                var type = $('.type').val();
                history.pushState(null,'',`?date=${date}&type=${type}`);
                window.location.reload();
            })

            $('.date-picker').daterangepicker({
                "singleDatePicker": true,
                "autoApply": true,
                "locale": {
                    "format": "YYYY-MM-DD",
                }
            });

            $('.date-picker').on('apply.daterangepicker', function(ev, picker) {
                var date = $('.date-picker').val();
                var type = $('.type').val();
                history.pushState(null,'',`?date=${date}&type=${type}`);
                window.location.reload();
            });

        })
    </script>
@endsection
