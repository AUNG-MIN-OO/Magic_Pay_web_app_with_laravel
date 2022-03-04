<?php

namespace App\Http\Controllers\Backend;

use App\AdminUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdminUser;
use App\Http\Requests\UpdateAdminUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Jenssegers\Agent\Agent;
use Yajra\DataTables\DataTables;

class AdminUserController extends Controller
{
    public function index(){
        return view('backend.admin_user.index');
    }

    public function create(){
        return view('backend.admin_user.create');
    }

    public function store(StoreAdminUser $request){
        $admin_user = new AdminUser();
        $admin_user->name = $request->name;
        $admin_user->email = $request->email;
        $admin_user->phone = $request->phone;
        $admin_user->password = Hash::make($request->password);
        $admin_user->save();

        return redirect()->route('admin.user.index')->with('success','New admin is added!');
    }

    public function edit($id){
        $admin_user = AdminUser::findOrFail($id);
        return view('backend.admin_user.edit',compact('admin_user'));
    }

    public function update(Request $request, $id){
        $admin_user = AdminUser::findOrFail($id);
        $admin_user->name = $request->name;
        $admin_user->email = $request->email;
        $admin_user->phone = $request->phone;
        $admin_user->password = $request->passwrod ? Hash::make($request->password) : $admin_user->password;
        $admin_user->update();

        return redirect()->route('admin.user.index')->with('success','Admin user info is updated!');

    }

    public function destroy($id){
        $admin_user = AdminUser::findOrFail($id);
        $admin_user->delete();
        return redirect()->route('admin.user.index')->with('success','Admin user is deleted!');
    }

    public function ssd(){
        $data = AdminUser::query();

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
            ->addColumn('action',function ($each){
                $edit_icon = '<a href="'.route('admin.user.edit',$each->id).'"class="btn btn-sm btn-warning mr-2"><i class="fas fa-user-edit"></i></a>';
                $delete_icon = '<a href="#" class="delete-admin btn btn-sm btn-danger" data-id="'.$each->id.'"><i class="fas fa-trash-alt"></i></a>';
                return $edit_icon . $delete_icon;
            })
            ->rawColumns(['user_agent', 'action'])
            ->make(true);
    }
}
