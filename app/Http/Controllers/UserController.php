<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    public function update(User $user)
    {
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
