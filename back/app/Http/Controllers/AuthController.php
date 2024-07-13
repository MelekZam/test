<?php

namespace App\Http\Controllers;

use App\Helpers\BackendError;
use App\Helpers\BackendResponse;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(RegisterRequest $request) {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $user = DB::transaction(function () use ($data) {
            return User::create($data);
        });
        return BackendResponse::success([
            'user' => new UserResource($user),
            'token' => $user->createToken("token")->plainTextToken,
        ]);
    }

    public function login(LoginRequest $request) {
        $user = User::ofEmail($request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return BackendError::notFound();
        }
        $token = $user->createToken("token");
        return BackendResponse::success([
            "user" => new UserResource($user),
            "token" => $token->plainTextToken,
        ]);
    }
}
