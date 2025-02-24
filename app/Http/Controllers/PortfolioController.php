<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\PortfolioResource;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PortfolioController extends Controller
{
    public function data()
    {
        $data = Portfolio::paginate(10);
        return PortfolioResource::collection($data);
    }
}
