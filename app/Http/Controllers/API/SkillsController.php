<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Resources\SkillResource;
use App\Http\Requests\Skill\StoreRequest;
use App\Http\Requests\Skill\UpdateRequest;
use Illuminate\Support\Facades\Log;
use App\Exceptions\SkillNotFoundException;

class SkillsController extends Controller
{
    public function index() {
        $skills = Skill::all();
    
        return response()->json(['skills'=>$skills]);
        
    }


    public function show(Skill $skill){
        $skill = new SkillResource($skill);
        return response()->json(['skill'=>$skill, 200]);
    }
  
    
    public function store(StoreRequest $request) {
        $skill = Skill::create($request->only('title'));

        return response()->json(['skill' => new SkillResource($skill)], 201);
    }
    

    public function update(UpdateRequest $request, Skill $skill) {
        $skill->update($request->only('title'));

        return response()->json(null, 204);
    }

    public function destroy(Skill $skill) {
        $skill->delete();

        return response()->json(null, 204);
    }
}