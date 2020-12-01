<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;

class UsersController extends Controller
{
    
    public function index(){

        $users = User::all();
                  
        return response()->json([
            'users'=>$users,
            'countUsers'=> $users->count()
            ]);     
    }

    // public function show($id) {
    //     $user = User::findOrFail($id);

    //     return response()->json(['user'=>$user]);
    // }

    public function show(User $user) {
        $user = new UserResource($user);

        return response()->json(['user'=>$user]);
    }

    public function store(StoreRequest $request) {
        $user = User::create($request->only('firstName', 'lastName', 'email', 'password'));

        return response()->json(['user'=>$user, 201]);
    }

    public function update(UpdateRequest $request, User $user) {
        $user->update($request->only('firstName', 'lastName', 'email'));

        return response()->json(null, 204);
    }

    public function destroy(User $user) {
        $user->delete();

        return response()->json(null, 204);
    }

}