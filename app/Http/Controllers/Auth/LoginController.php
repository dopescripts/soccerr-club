<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        session()->put('id', $user->id);
        session()->put('role', $user->role);

        if ($user->role === 'admin') {
            return redirect()->route('admin.home')->with('success', 'Admin login successfully');
        } elseif ($user->role === 'user') {
            return redirect()->route('home')->with('success', 'user login successfully');
        }
        // if ($user->role === 'vendor') {
        //     return redirect()->route('vendor.index')->with('success', 'vendor login successfully');
        // } elseif ($user->role === 'user') {
        //     return redirect()->route('home')->with('success', 'user login successfully');
        // }

        return redirect()->back()->with('success', 'Login successfully');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        // Add a success message to the session
        Session::flash('info', 'Logout Successfully.');

        return redirect('/');
    }
}