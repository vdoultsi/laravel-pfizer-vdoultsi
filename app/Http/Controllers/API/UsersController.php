<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;


class UsersController extends Controller
{
    
    public function index(){

        $users = User::all();
                  
        return response()->json([
            'users'=>$users,
            'countUsers'=> $users->count()
            ]);     
    }

    public function show($id) {
        $user = User::findOrFail($id);

        return response()->json(['user'=>$user]);
    }
}