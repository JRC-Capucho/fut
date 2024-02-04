<?php

namespace App\Http\Controllers\Publics;

use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User\Services\CreateUserService;
use App\Models\User\Services\UpdateUserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class UserController extends Controller
{

    public function store(StoreUserRequest $request): JsonResponse
    {
        $createUserService = new CreateUserService();
        return $createUserService->execute($request->validated());
    }

    public function update(UpdateUserRequest $request): JSon
    {
        $updateUserService = new UpdateUserService();
        return $updateUserService->execute($user);
    }
}
