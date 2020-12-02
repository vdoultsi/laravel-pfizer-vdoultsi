<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\User;

class ManagersDepartmentsController extends Controller
{
    public function update(Department $department, User $manager) {
        $department->manager()->associate($manager);
        $department->save();

        return response()->json(null, 204);
    }

    public function destroy(Department $department, User $manager){
        $department->manager()->disassociate();
        $department->save();

        return response()->json(null,204);
    }
}
