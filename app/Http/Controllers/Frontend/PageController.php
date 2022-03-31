<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePassword;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PageController extends Controller
{
    public function home(){
        return view('frontend.home');
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
}
