<?php

namespace App\Http\Resources\Api;

class ApiSuccess
{
    public function __invoke($data)
    {
        return response()->json([
            'status' => 'Success',
            'data' => $data
        ]);
    }
}
