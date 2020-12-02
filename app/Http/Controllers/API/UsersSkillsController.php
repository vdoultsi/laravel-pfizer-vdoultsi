<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UsersSkills\StoreRequest;
use App\Http\Resources\SkillResource;

class UsersSkillsController extends Controller
{
    // public function index($id) {
    //     $user = User::with('skills')->findOrFail($id);

    //     return response()->json([
    //         'skills' => $user->skills
    //     ]);
    // }
    public function index(User $user) {
        $skills = SkillResource::collection($user->skills);

        return response()->json(compact('skills'));
    }

    public function store(StoreRequest $request, User $user) {
        $user->skills()->sync($request->input('skills'));

        $user->load('skills');

        $skills = SkillResource::collection($user->skills);

        return response()->json(compact('skills'), 201);
    }

}

