<?php

namespace App\Http\Controllers\Publics;

use App\Models\HealthCheck\HealthCheck;
use Illuminate\Routing\Controller;

class HealthCheckController extends Controller
{
    function __construct()
    {
        $this->middleware('auth:api', ['except' => ['check']]);
    }

    public function check()
    {
        $healtCheck = new HealthCheck();
        return $healtCheck->check();
    }
}
