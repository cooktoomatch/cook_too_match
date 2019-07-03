<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Auth;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::orderBy('created_at', 'asc')->paginate(10);
        return view('users_index', ['users' => $users]);
    }

    public function new()
    {
        // 
    }

    public function create(Request $request)
    {
        // 
    }

    public function show(User $users)
    {
        return view('users_show', ['user' => $users]);
    }

    public function edit(User $users)
    {
        return view('users_edit', ['user' => $users]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'icon' => 'file | image | mimes:jpeg,png',
            'name' => 'required',
            'email' => 'required | max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/users/edit/' . $request->id)
                ->withInput()
                ->withErrors($validator);
        }

        dd($request->file('icon'));

        $users = User::find($request->id);
        $users->name = $request->name;
        $users->email = $request->email;
        $filename = $request->file('icon')->store('public/user_icon');
        $users->icon = basename($filename);
        $users->description = $request->description;
        $users->longitude = $request->longitude;
        $users->latitude = $request->latitude;
        $users->save();
        return redirect('/users');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/users');
    }
}
