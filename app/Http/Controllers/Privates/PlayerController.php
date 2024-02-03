<?php

namespace App\Http\Controllers\Privates;

use App\Http\Requests\Player\StorePlayerRequest;
use App\Models\Player\Services\CreatePlayerService;
use Illuminate\Routing\Controller;

class PlayerController extends Controller
{
    public function store(StorePlayerRequest $request)
    {
        $createPlayerService = new CreatePlayerService();
        return $createPlayerService->execute($request->input());
    }

    public function update()
    {
        # code...
    }
}
