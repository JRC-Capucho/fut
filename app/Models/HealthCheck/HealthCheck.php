<?php

namespace App\Models\HealthCheck;

use Illuminate\Http\JsonResponse;

class HealthCheck
{
    public function check(): JsonResponse
    {
        return response()->json(["health"]);
    }
}
