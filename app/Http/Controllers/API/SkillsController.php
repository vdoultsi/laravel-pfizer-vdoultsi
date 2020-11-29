<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    public function index() {
        $skills = Skill::all();
    
        return response()->json(['skills'=>$skills]);
        //return compact('skills');
    }

    public function show($id) {
        $skill = Skill::findOrFail($id);

        return response()->json(['skill'=>$skill]);
    }
}
