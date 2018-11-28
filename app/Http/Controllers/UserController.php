<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $redirectTo = '/';

    public function __construct()
    {
//        $this->middleware('guest', ['except' => '']);
    }

    public function edit(User $user)
    {
        if (auth()->id() !== $user->id) {
            return redirect()->home();
        }

        return view('user.edit', compact('user'));
    }

    public function update(User $user)
    {
        if (auth()->id() !== $user->id) {
            return redirect()->home();
        }

        $this->validate(request(), [
            'student_id' => 'required',
            'name' => 'required',
        ]);

        $user->student_id = request('student_id');
        $user->name = request('name');
        $user->save();

        return redirect()->home();
    }
}
