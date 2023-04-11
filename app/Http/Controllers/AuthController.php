<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request as FacadesRequest;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    /**
     * showLoginForm
     * if user is logged in, redirect to home page, otherwise return login page
     *
     * @return void
     */
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect('/');
        }
        return view('login');
    }

    /**
     * login
     * process login
     *
     * @param  mixed $request
     * @return void
     */
    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|max:255'
        ]);

        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            // Authentication passed...
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return redirect()->back()->withErrors([
            'message' => 'The provided credentials do not match our records.',
        ]);
    }

    /**
     * showRegisterForm
     * if user is logged in, redirect to home page, otherwise return register page
     *
     * @return void
     */
    public function showRegisterForm()
    {
        if (Auth::check()) {
            return redirect('/');
        }
        return view('register');
    }

    /**
     * register
     * process register, redirect to login page if successful
     *
     * @param  mixed $request
     * @return void
     */
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|max:255',
            'password_confirmation' => 'required|same:password'
        ]);
        if ($data) {
            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password'],)
            ]);
        }
        return redirect('login');
    }
    
    /**
     * logOut
     * logged out user, redirect back to home page
     *
     * @return void
     */
    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
