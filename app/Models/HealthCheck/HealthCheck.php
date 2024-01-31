<?php

namespace App\Models\HealthCheck;

use Illuminate\Http\Response;

class HealthCheck
{
    public function check(): Response
    {
        return response('health');
    }
}
