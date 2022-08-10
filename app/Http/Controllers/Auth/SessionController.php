<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request)
    {
        $request->authenticate();

        session()->regenerate();
        
        if(auth()->user()->isAdmin == true){
            return redirect(RouteServiceProvider::ADMIN_HOME)->with('success', 'Welcome Back '. auth()->user()->name);
        }
        return redirect('/')->with('success','Welcome Back!');
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'GoodBye');
    }

}
