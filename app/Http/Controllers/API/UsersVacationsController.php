<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\VacationResource;
use App\Models\User;
use App\Models\Vacation;
use App\Http\Requests\UsersVacations\StoreRequest;
use App\Http\Requests\UsersVacations\UpdateRequest;

class UsersVacationsController extends Controller
{
    public function index(User $user){
        $vacations = VacationResource::collection($user->vacations);

        //return response()->json(compact('vacations'));
        return response()->json(['vacations'=>$vacations, 200]);
 
    }

    public function show(User $user, Vacation $vacation){
        $vacation = new VacationResource($vacation);

        return response()->json(compact('vacation'));
    }

    public function store(User $user, StoreRequest $request) {
        $user->vacations()->create($request->only('from', 'to'));

        return response()->json(null, 201);
    }

    public function update(User $user, Vacation $vacation, UpdateRequest $request) {
        $vacation->update($request->only('from', 'to'));

        return response()->json(null, 204);
    }
    
    public function destroy(User $user, Vacation $vacation) {
        $vacation->delete();

        return response()->json(null, 204);
    }
}
