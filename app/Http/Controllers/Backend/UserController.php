<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\UUIDGenerate;
use App\Http\Requests\StoreUser;
use App\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUser;
use App\Wallet;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Jenssegers\Agent\Agent;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index(){
        return view('backend.user.index');
    }

    public function create(){
        return view('backend.user.create');
    }

    public function store(StoreUser $request){

        //to avoid db fail for two process
        //reference in laravel db transaction
        DB::beginTransaction();

        try {

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = Hash::make($request->password);
            $user->save();

            Wallet::firstOrCreate(
                [
                    'user_id' => $user->id,
                ],
                [
                    'account_number' => UUIDGenerate::accountNumber(),
                    'amount' => 0,
                ]
            );

        }
        catch (\Exception $exception){
            return back()->with('error','Something went wrong! Please try again.');
        }

        DB::commit();
        return redirect()->route('admin.user.index')->with('success','New user is added!');
    }

    public function edit($id){
        $user = User::findOrFail($id);
        return view('backend.user.edit',compact('user'));
    }

    public function update(UpdateUser $request, $id){

        DB::beginTransaction();

        try {

            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = $request->passwrod ? Hash::make($request->password) : $user->password;
            $user->update();

            Wallet::firstOrCreate(
                [
                    'user_id' => $user->id,
                ],
                [
                    'account_number' => UUIDGenerate::accountNumber(),
                    'amount' => 0,
                ]
            );

        }
        catch (\Exception $exception){

            return back()->with('error','Something went wrong! Please try again.');

        }

        DB::commit();
        return redirect()->route('admin.user.index')->with('success','User info is updated!');

    }

    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.user.index')->with('success','User is deleted!');
    }

    public function ssd(){
        $data = User::query();

        return DataTables::of($data)
            ->editColumn('user_agent',function ($each){
                if ($each->user_agent){
                    $agent = new Agent();
                    $agent->setUserAgent($each->user_agent);
                    $device = '<span class="badge small badge-success badge-pill">'.$agent->device().'</span> <br>';
                    $platform = '<span class="badge small badge-success badge-pill">'.$agent->platform().'</span> <br>';
                    $browser = '<span class="badge small badge-success badge-pill">'.$agent->browser().'</span>';
                    return '
                    <table class="">
                        <tr>
                            <th>Device</th>
                            <td>'.$device.'</td>
                        </tr>
                        <tr>
                            <th>Platform</th>
                            <td>'.$platform.'</td>
                        </tr>
                        <tr>
                            <th>Browser</th>
                            <td>'.$browser.'</td>
                        </tr>
                    </table>
                ';
                }else{
                    return "-";
                }

            })
            ->editColumn('created_at',function ($each){
                return Carbon::parse($each->created_at)->format('Y-m-d H:i:s');
            })
            ->editColumn('updated_at',function ($each){
                return Carbon::parse($each->updated_at)->format('Y-m-d H:i:s');
            })
            ->addColumn('action',function ($each){
                $edit_icon = '<a href="'.route('admin.user.edit',$each->id).'"class="btn btn-sm btn-warning mr-2"><i class="fas fa-user-edit"></i></a>';
                $delete_icon = '<a href="#" class="delete-admin btn btn-sm btn-danger" data-id="'.$each->id.'"><i class="fas fa-trash-alt"></i></a>';
                return $edit_icon . $delete_icon;
            })
            ->rawColumns(['user_agent', 'action'])
            ->make(true);
    }
}
