<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransferConfirm;
use App\Http\Requests\UpdatePassword;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PageController extends Controller
{
    public function home(){
        $user = Auth::guard('web')->user();
        return view('frontend.home',compact('user'));
    }

    public function profile(){
        $user = Auth::guard('web')->user();
        return view('frontend.profile',compact('user'));
    }

    public function updatePassword(){
        return view('frontend.update_password');
    }

    public function updatePasswordStore(UpdatePassword $request){

        $old_password = $request->old_password;
        $new_password = $request->new_password;
        $hashed_password = Auth::user()->password;

        if (Hash::check($old_password,$hashed_password)){

            $user = Auth::guard('web')->user();
            $user->password = Hash::make($new_password);
            $user->update();

            return redirect()->route('profile')->with('success','Password is updated');
        }

        return redirect()->back()->withErrors(['fail'=>'Old password is not match!'])->withInput();

    }

    public function wallet(){
        $authUser = auth()->guard('web')->user();
        return view('frontend.wallet',compact('authUser'));
    }

    public function transfer(){
        $authUser = auth()->guard('web')->user();
        return view('frontend.transfer',compact('authUser'));
    }

    public function transferConfirm(TransferConfirm $request){
        $authUser = auth()->guard('web')->user();
        $receiver_phone = $request->receiver_phone;
        $amount = $request->amount;
        $desc = $request->desc;
        return view('frontend.transfer_confirm',compact('authUser','receiver_phone','amount','desc'));
    }
}
