<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{

   /**
    * It returns the view `auth.login`
    *
    * @return The view auth.login
    */
   public function index()
   {
        return \view('auth.login');
   }

  /**
   * If the user is not authenticated, return back to the login page with a status message. Otherwise,
   * redirect to the dashboard.
   *
   * @param Request request This is the request object that contains the data that was submitted from
   * the form.
   *
   * @return The user is being redirected to the dashboard.
   */
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
