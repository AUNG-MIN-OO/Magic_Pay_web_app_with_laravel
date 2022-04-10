<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\UUIDGenerate;
use App\Http\Controllers\Controller;
use App\Http\Requests\TransferConfirm;
use App\Http\Requests\UpdatePassword;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

    public function receiverPhoneVerify(Request $request){
        $authUser = auth()->guard('web')->user();

        if ($authUser->phone != $request->phone){
            $user = User::where('phone',$request->phone)->first();
            if ($user){
                return response()->json([
                    'status' => 'success',
                    'data' => $user
                ]);
            }
        }

        return response()->json([
            'status' => 'fail'
        ]);
    }

    public function transferConfirm(TransferConfirm $request){

        $receiver_acc = User::where('phone',$request->receiver_phone)->first();

        if (!($receiver_acc)){
            return back()->withErrors(['receiver_phone'=>'Please enter valid phone number.'])->withInput();
        }

        $authUser = auth()->guard('web')->user();

        if ($authUser->phone == $request->receiver_phone){
            return back()->withErrors(['receiver_phone'=>'Please enter valid phone number.'])->withInput();
        }

        $receiver_phone = $request->receiver_phone;
        $amount = $request->amount;
        $desc = $request->desc;
        return view('frontend.transfer_confirm',compact('authUser','receiver_acc','receiver_phone','amount','desc'));
    }

    public function confirmPassword(Request $request){
        $authUser = auth()->guard('web')->user();
        $hash_check = Hash::check($request->password,$authUser->password);
        if ($hash_check){
            return response()->json([
                'status' => 'success',
                'message' => 'Password is correct',
            ]);
        }

        return response()->json([
            'status' => 'fail',
            'message' => 'Please check your password again.',
        ]);
    }

    public function transferComplete(Request $request){

        if ($request->amount < 1000){
            return back()->withErrors(['amount'=>'Amount must be over 1000 MMK.']);
        }

        $receiver_acc = User::where('phone',$request->receiver_phone)->first();

        if (!($receiver_acc)){
            return back()->withErrors(['receiver_phone'=>'Please enter valid phone number.'])->withInput();
        }

        $authUser = auth()->guard('web')->user();

        if ($authUser->phone == $request->receiver_phone){
            return back()->withErrors(['receiver_phone'=>'Please enter valid phone number.'])->withInput();
        }

        $amount = $request->amount;
        $desc = $request->desc;

        if (!($authUser->wallet || $receiver_acc->wallet)){
            return back()->withErrors(['fail' => 'Something went wrong!'])->withInput();
        }

        DB::beginTransaction();

        try {
            $authUser_wallet = $authUser->wallet;
            $authUser_wallet->decrement('amount',$amount);
            $authUser_wallet->update();

            $receiver_acc_wallet = $receiver_acc->wallet;
            $receiver_acc_wallet->increment('amount',$amount);
            $receiver_acc_wallet->update();

            $ref_nbr = UUIDGenerate::refNumber();

            $authUser_transaction = new Transaction();
            $authUser_transaction->ref_nbr = $ref_nbr;
            $authUser_transaction->trx_id = UUIDGenerate::trxNumber();
            $authUser_transaction->user_id = $authUser->id;
            $authUser_transaction->type = 2;
            $authUser_transaction->amount = $amount;
            $authUser_transaction->source_id = $receiver_acc->id;
            $authUser_transaction->description = $desc;
            $authUser_transaction->save();

            $receiver_transaction = new Transaction();
            $receiver_transaction->ref_nbr = $ref_nbr;
            $receiver_transaction->trx_id = UUIDGenerate::trxNumber();
            $receiver_transaction->user_id = $receiver_acc->id;
            $receiver_transaction->type = 1;
            $receiver_transaction->amount = $amount;
            $receiver_transaction->source_id = $authUser->id;
            $receiver_transaction->description = $desc;
            $receiver_transaction->save();

            DB::commit();

            return  redirect('/')->with('transfer_success','Successfully transferred.');
        }catch (\Exception $error){

            DB::rollBack();
            return back()->withErrors(['fail'=>'Something was wrong!'.$error->getMessage()])->withInput();
        }
    }
}
