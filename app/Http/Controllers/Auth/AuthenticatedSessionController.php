<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthenticatedSessionController extends Controller
{
    public function index()
    {
        return view('loginAdmin');
    }
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // return view('auth.login');
        return view('loginAdmin');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate($request);

        $user = DB::table('users')
                    ->where('email', $request->email)
                    ->first();

        switch($user->role){
            case 1:
                $request->session()->regenerate();
                return redirect()->intended('/dashboard');
                break;
            case 2:
                $request->session()->regenerate();
                return redirect()->intended('/user/homecare');
                break;
            case 3:
                $request->session()->regenerate();
                return redirect()->intended('/dashboard');
                break;
            default:
                // $request->session()->regenerate();
                return redirect()->intended('/login');
        }
        // $request->authenticate();

        // $request->session()->regenerate();

        // return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
