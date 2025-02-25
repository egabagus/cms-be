<?php

namespace App\Http\Resources\Api;

class ApiError
{
    public function __invoke($err)
    {
        return response()->json([
            'status' => 'Error',
            'message' => $err
        ], 500);
    }
}
