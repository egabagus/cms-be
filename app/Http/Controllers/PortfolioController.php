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

    public function store(PortfolioRequest $request)
    {
        try {
            $new                = new Portfolio();
            $new->title         = $request->title;
            $new->save();

            return (new ApiSuccess())($new);
        } catch (\Throwable $th) {
            return (new ApiError())($th->getMessage());
        }
    }
}
