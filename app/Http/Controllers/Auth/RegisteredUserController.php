<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
// use Illuminate\Container\Attributes\Log;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration Form view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     * this store() method is called when user submit the form
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        event(new Registered($user));
        Auth::login($user);

        // $url = '';
        // if ($request->user()->role === 'admin') {
        //     $url = 'admin/dashboard';
        // } else {
        //     $url = 'user/dashboard';
        // } 
        // Log::info('Redirecting to: ' . $url);
        // Log::info('User role: ' . ($request->user() ? $request->user()->role : 'Guest'));
        // return redirect()->intended($url);
        // return redirect(route('user.dashboard', absolute: false));

        // return redirect()->route('user.dashboard') ;


        // if ($request->user()->role === 'admin') {
        //     return redirect()->route('admin.dashboard');
        // }
        // if ($request->user()->role === 'user') {
        //     return redirect()->route('user.dashboard');
        // }

        return redirect('/') ; 
    }
}


