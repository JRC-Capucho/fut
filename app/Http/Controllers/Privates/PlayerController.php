<?php

namespace App\Http\Controllers\Privates;

use App\Models\Player\Services\CreatePlayerService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PlayerController extends Controller
{
    function __construct()
    {
        $this->middleware('auth:api');
    }

    public function store(Request $request)
    {
        $createPlayerService = new CreatePlayerService();
        return $createPlayerService->execute($request->input());
    }
}
