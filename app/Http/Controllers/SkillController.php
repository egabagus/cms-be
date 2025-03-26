<?php

namespace App\Http\Controllers;

use App\Http\Resources\SkillResource;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function data(Request $request)
    {
        $data = Skill::paginate($request->per_page ?? 10);
        return SkillResource::collection($data);
    }
}
