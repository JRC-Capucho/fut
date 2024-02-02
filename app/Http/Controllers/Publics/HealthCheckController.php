<?php

namespace App\Http\Controllers\publics;

use App\Models\HealthCheck\HealthCheck;

class HealthCheckController
{
    public function check()
    {
        $healtCheck = new HealthCheck();
        return $healtCheck->check();
    }
}
