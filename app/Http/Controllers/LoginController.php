<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function main(){
        return view('static.login');
    }

    public function authentification(Request $request){
        // Checking data for valid
        $credentials = $request -> validate([
            'username' => ['required', 'min:2'],
            'password' => ['required'],
        ]);

        // Trying to login
        $attempt = Auth::attempt([
            'name' => $credentials['username'],
            'password' => $credentials['password'],
        ]);

        // Logined? -> go to main page
        if ($attempt) {
            $request->session()->regenerate();
            return redirect()->route('main');
        } else { // Else -> try again
            return redirect()->route('start');
        }
    }

    public function registration(Request $request){
        // Checking data for valid
        $credentials = $request -> validate([
            'username' => ['required', 'min:2'],
            'password' => ['required'],
            'password_auth' => ['required', 'same:password'],
        ]);

        // Creating class object - user
        $user = new User();
        $user->name = $request->input('username'); // Taking username and password from input in form
        $user->password = $request->input('password');
        $user->save(); // Saving new user

        // Logining
        Auth::attempt([
            'name' => $user->name,
            'password' => $user->password,
        ]);

        // Rebuild session
        $request->session()->regenerate();
        return redirect()->route('main');
    }

    public function quit(Request $request){
        Auth::logout();
        $request->session()->flush();

        return redirect()->route('start');
    }
}
