<?php

namespace App\Http\Controllers;

use App\Http\Request\UserRegisterRequest;
use App\Http\Resource\UserResource;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResource;

class UserController extends Controller
{
    public function register(UserRegisterRequest $request): JsonResponse
    {
        $user = User::create(request->validated());
    
        return (new UserResource($user))->response()->setStatusCode(201);
    }
}
