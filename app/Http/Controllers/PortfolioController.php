<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PortfolioRequest;
use App\Http\Resources\Api\ApiError;
use App\Http\Resources\Api\ApiSuccess;
use App\Http\Resources\PortfolioResource;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PortfolioController extends Controller
{
    public function data(Request $request)
    {
        $data = Portfolio::paginate($request->per_page ?? 10);
        return PortfolioResource::collection($data);
    }

    public function show($id)
    {
        $data = Portfolio::find($id);
        return (new ApiSuccess())($data);
    }

    public function store(PortfolioRequest $request)
    {
        try {
            $new               = new Portfolio();
            $new->title        = $request->title;
            $new->meta_desc    = $request->meta_desc;
            $new->description  = $request->description;
            $new->link         = $request->link;
            $new->tech         = $request->tech;

            // dd($request->file('thumbnail'));
            $thumbnail = $request->file('thumbnail')->store('uploads', 'public');
            $new->thumbnail    = $thumbnail;

            $new->save();

            $new->technology()->sync($request->technologies);

            return (new ApiSuccess())($new);
        } catch (\Throwable $th) {
            return (new ApiError())($th->getMessage());
        }
    }
}
