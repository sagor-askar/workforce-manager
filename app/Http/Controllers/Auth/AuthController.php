<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
     public function loginForm()
     {
         return view('auth.login');
     }
    public function login(Request $request)
    {
        $request->validate([
            'pin' => 'required',
        ]);
        $user = User::where('pin',$request->pin)->first();
        if ($user) {
            return redirect()->route('employee.index')
                ->withSuccess('You have Successfully loggedin');
        }
        return redirect()->back()->withError('Opps! You Passed Invalid Pin');
    }

    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('/admin')->withError('Successfully Logout !');

    }
}
