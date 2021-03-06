<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function listUser(){
        $users = User::all()->where('role','User');
        return view('admin.listuser', compact('users'));
    }

    public function destroyUser(User $user){
        $user->delete();
        return back()->with('msg','User Successfully Deleted!');
    }
}
