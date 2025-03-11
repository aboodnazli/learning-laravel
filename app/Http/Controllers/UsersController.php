<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users', compact('users'));
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:10',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password')); // Use bcrypt instead of password_hash
        $user->save();

        return redirect(to : 'users');
      }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->back()   ;
    }

    public function edit($id)
    {
        $users = User::all();
        $user = User::find($id);
        return view('users', compact('user', 'users'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:10',
            'email' => 'required|email',
            'password' => 'nullable|min:6', // Make password nullable for updates
        ]);

        $user = User::find($request->input('id'));
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->input('password')) {
            $user->password = bcrypt($request->input('password')); // Encrypt new password
        }

        $user->save();

        return redirect(to : 'users');
        }
}
