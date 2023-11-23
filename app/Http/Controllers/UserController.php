<?php

namespace App\Http\Controllers;


use App\Models\UserModel;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function tampil_user()
    {
        return view('admin.user.user')->with([
            'user' => UserModel::all(),
        ]);
    }

    public function create_user()
    {
        return view('admin.user.tambah');
    }

    public function store(Request $request)
    {

        $user = UserModel::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role'=> $request->input('role'),
            'password' => bcrypt($request->input('password')),
        ]);

        return redirect('/user');
        // $user = UserModel::create($request->all());
        // return redirect('/user');
    }

    public function edit_user(Request $request, $id)
    {

        $user = UserModel::findOrFail($id);
        return view('admin.user.edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $user = UserModel::findOrFail($id);
        $user->update($request->all());
        $user->update([
            'password' => bcrypt($request->new_password),   ]);
        return redirect('/user');
    }
    
    public function destroy($id)
    {
        $deletedUser = UserModel::findOrFail($id);
        $deletedUser->delete();
        
        return redirect('/user');
    }

}