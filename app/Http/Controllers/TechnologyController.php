<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\TechnologyResource;
use App\Models\Technology;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    public function data(Request $request)
    {
        $data = Technology::paginate($request->per_page ?? 10);
        return TechnologyResource::collection($data);
    }
}
