<?php

namespace App\Http\Controllers;

use App\Http\Requests\SkillRequest;
use App\Http\Resources\Api\ApiError;
use App\Http\Resources\Api\ApiSuccess;
use App\Http\Resources\SkillResource;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class SkillController extends Controller
{
    public function data(Request $request)
    {
        $data = Skill::paginate($request->per_page ?? 10);
        return SkillResource::collection($data);
    }

    public function store(SkillRequest $request)
    {
        DB::beginTransaction();
        try {
            $payload = [
                'name' => $request->name,
                'description' => $request->description,
                'level' => $request->level,
            ];

            $newSkill = Skill::create($payload);

            DB::commit();
            return (new ApiSuccess())($newSkill);
        } catch (Throwable $th) {
            DB::rollBack();
            return (new ApiError())($th->getMessage());
        }
    }

    public function update(int $id, SkillRequest $request)
    {
        DB::beginTransaction();
        try {
            $payload = [
                'name' => $request->name,
                'description' => $request->description,
                'level' => $request->level,
            ];

            $update = Skill::find($id)->update($payload);

            DB::commit();
            return (new ApiSuccess())($update);
        } catch (Throwable $th) {
            DB::rollBack();
            return (new ApiError())($th->getMessage());
        }
    }
}
