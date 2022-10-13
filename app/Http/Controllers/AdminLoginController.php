<?php

namespace App\Http\Controllers;
use Hash;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function adminlogin()
    {
            return view('admin.login');
    }


    public function logincheck(Request $request)
    {
        $data = array(
            'email' => $request->email,
            'password' => $request->password
        );
        if (Auth::attempt($data)) {

            $user_id = Auth::user()->id;
            $user_name = Auth::user()->email;
            return redirect('/dashboard');
        } else {
            session()->flash('message', 'email or password are incorrect');
        }
        return redirect('/login');
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
      }

      public function changePassword(){
        return view('admin.changepassword');
    }
    public function changPasswordStore(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        return redirect()->route('login')->with('success','Password successfully changed');
    }

}
