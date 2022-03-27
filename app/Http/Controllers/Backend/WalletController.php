<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Wallet;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;

class WalletController extends Controller
{
    public function index(){
        return view('backend.wallet.index');
    }

    public function ssd(){
        $wallet = Wallet::with('user');

        return DataTables::of($wallet)
            ->addColumn('owner_name',function ($each){
                $user = $each->user;
                if ($user){
                    return '<p>Name : '.$user->name.'</p><br><p class="text-nowrap">Name : '.$user->email.'</p><br><p>Name : '.$user->phone.'</p>';
                }
                return '-';
            })
            ->editColumn('amount',function ($each){
                return number_format($each->amount,2);
            })
            ->editColumn('created_at',function ($each){
                $date = Carbon::parse($each->created_at)->format('Y-m-d');
                $time = Carbon::parse($each->created_at)->format('H:i:s');
                return '<span class="badge badge-success badge-pill">'.$date.'</span><br><span class="badge badge-success badge-pill">'.$time.'</span>';
            })
            ->editColumn('updated_at',function ($each){
                $date = Carbon::parse($each->updated_at)->format('Y-m-d');
                $time = Carbon::parse($each->updated_at)->format('H:i:s');
                return '<span class="badge badge-primary badge-pill">'.$date.'</span><br><span class="badge badge-primary badge-pill">'.$time.'</span>';            })
            ->rawColumns(['owner_name','created_at','updated_at'])
            ->make(true);
    }
}
