use Illuminate\Http\JsonResponse;
use Illuminate\support\Str;
use Illuminate\support\Facades\Hash;
use Illuminate\support\Facades\Auth;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserController extends Controller
@@ -38,4 +39,10 @@ public function login(UserLoginRequest $request): UserResource
        $user->save();
        return new UserResource($user);
    }

    public function get(Request $request): UserResource
    {
        $user = Auth::user();
        return new UserResource($user);
    }
}<?php

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
