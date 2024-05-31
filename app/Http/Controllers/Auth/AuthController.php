<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function login(Request $request)
    {
        return view('auth.login');
    }
    public function register(Request $request)
    {
        return view('auth.register');
    }
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:20',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5|max:20',
            'cpassword' => 'required|same:password',
        ], [
            'cpassword.same' => 'The confirm password same as password',
            'cpassword' => 'The confirm password field is required',
            
        ]);
        User::create($request->input());
        return redirect('login')->with('success', 'User create successfully now you can login yourself!');
    }
    public function check(Request $request){
        $request->validate([
            'email'=>'required|email|exists:users,email',
            'password'=>'required',
        ]);

        $getUser = User::where('email', $request->email)->first();
        $getUserId = $getUser->id;
        $getUserPassword = $getUser->password;
        $passwordCheck = Hash::check($request->password, $getUserPassword);
            if ($passwordCheck) {
                $creds = $request->only('email', 'password');
                if (Auth::guard('web')->attempt($creds)) {
                    return redirect('/')->with('success', 'LogIn Successfull');
                } else {
                    return redirect()->back()->with('fail', 'data not found');
                }
            } else {
                return redirect()->back()->with('passwordError', 'password not matched');
            }
    }
    function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }
}
