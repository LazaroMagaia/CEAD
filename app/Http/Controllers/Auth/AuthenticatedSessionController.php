<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

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

        $enviado = $request->session()->regenerate();
        if($enviado){
            $user = Auth::user();
            if($user->role === 'admin'){
                return redirect()->intended(route('admin.index', absolute: false));
            }else
            if( $user->role === 'tutor'){
                return redirect()->intended(route('tutor.index', absolute: false));
            }
            if($user->role === 'estudante'){
                return redirect()->intended(route('student.index', absolute: false));
            }
        }else
        {
            return redirect()->intended(route('login', absolute: false));
        }
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
