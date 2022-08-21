<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
   public function index()
   {
        return \view('auth.login');
   }

   public function store(Request $request)
   {
        $this->validate( $request, [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // attempt for the authenticated users
        if (!auth()->attempt( $request->only('email', 'password'))) {
            return back()->with('status', 'There was a problem logging in. Check your email and password or create an account.');
        }

        return \redirect()->route('dashboard.index');
   }
}
