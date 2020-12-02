<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\DepartmentResource;
use App\Models\Department;
use App\Http\Requests\Department\StoreRequest;
use App\Http\Requests\Department\UpdateRequest;

class DepartmentsController extends Controller
{
    public function index() {
        // $departments = DepartmentResource::collection(Department::all());

        // return response()->json(compact('departments'));
        $departments = Department::all();
    
        return response()->json(['departments'=>$departments]);
        
    }

    public function show(Department $department) {
        $department = new DepartmentResource($department);

        return response()->json(['department'=>$department, 200]);

    }

    public function store(StoreRequest $request) {
        $department = Department::create($request->only('title', 'manager_id'));

        return response()->json(['department' => new DepartmentResource($department)], 201);
    }

    public function update(Department $department, UpdateRequest $request) {
        $department->update($request->only('title', 'manager_id'));

        return response()->json(null, 204);
    }

    public function destroy(Department $department) {
        $department->delete();

        return response()->json(null, 204);
    }
}
