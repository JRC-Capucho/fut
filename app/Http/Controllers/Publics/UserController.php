<?php

namespace App\Http\Controllers\Publics;

use App\Models\User\Services\CreateUserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $createUserService = new CreateUserService();
        return $createUserService->execute($request->input());
    }
}
