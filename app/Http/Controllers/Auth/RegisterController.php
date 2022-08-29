<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * The `__construct()` function is a special function that is automatically called when a class is
     * instantiated.
     *
     * The `__construct()` function is used to initialize the object's properties upon object creation
     */
    public function __contruct()
    {
        $this->middleware('guest');
    }

    /**
     * It returns the view `auth.register`
     *
     * @return The view file 'auth.register'
     */
    public function index()
    {
        return \view('auth.register');
    }

    /**
     * We validate the request, create a new user, and then log them in
     *
     * @param Request request The request object.
     *
     * @return The user is being returned.
     */
    public function store(Request $request)
    {

        $this->validate( $request, [
            'name' => ['required', 'max:255'],
            'username' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed'],
        ]);

        User::create([
            'name' => $request->name,
            'user_name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        auth()->attempt($request->only('email', 'password'));

        return \redirect()->route('dashboard.index');
    }
}
