<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;

class DepartmentsUsersController extends Controller
{
    public function update(Department $department, User $user) {
        $user->department()->associate($department);
        $user->save();

        return response()->json(null, 204);
    }

    public function destroy(Department $department, User $user){
        $user->department()->disassociate();
        $user->save();

        return response()->json(null,204);
    }
}
