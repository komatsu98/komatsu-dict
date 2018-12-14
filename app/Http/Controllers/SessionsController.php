<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'destroy']);
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        //auth user
//        $requestToLowerCase = ['email' => strtolower(request('email')), 'password' => request('password')];
        if(!auth()->attempt(request(['email', 'password']))) {
            return back()->withErrors([
                'message' => "lease check your credentials and try again."
            ]);
        };

        return redirect()->home();

    }

    public function destroy()
    {
        auth()->logout();

        return redirect()->home();
    }
}
