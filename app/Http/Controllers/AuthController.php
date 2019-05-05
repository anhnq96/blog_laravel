<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * Signin to system
    */
    public function signin(Request $request) {
        $input = $request->only(['email', 'password']);
        $user = Auth::attempt($input);
        if ($user) {
            return response()->redirectToRoute('home');
        } else {
            Session::flash('error', 'Username or password are not correct');
            return back();
        }
    }
}
