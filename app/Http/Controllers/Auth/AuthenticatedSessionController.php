<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;


// this controller handles the logic for logging in and logout users

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        // $url = '';
        // if ($request->user()->role === 'admin') {
        //     $url = 'admin/dashboard';
        // } else {
        //     $url = 'user/dashboard';
        // }
        // dd($url) ;
        // Log::info('Redirecting to: ' . $url);
        // Log::info('User role: ' . ($request->user() ? $request->user()->role : 'Guest'));   
        // return redirect()->intended($url);

        // if($request->user()->role === 'admin'){
        //     return redirect()->route('admin.dashboard') ;
        // }
        
        // if($request->user()->role === 'user')
        // {
        //     return redirect()->route('user.dashboard') ;
        // } 
        // return redirect()->route('') ;
        return redirect('/') ;
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
