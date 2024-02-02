<?php

namespace App\Http\Controllers\Privates;

use App\Models\Player\Service\CreatePlayerService;
use Illuminate\Http\Client\Request;
use Illuminate\Routing\Controller;

class PlayerController extends Controller
{

    public function store(Request $request)
    {
        $createPlayerService = new CreatePlayerService();
        return $createPlayerService->execute($request->input());
    }
}
