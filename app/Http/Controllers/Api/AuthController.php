<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginUserRequest;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use ApiResponse;

    public function login(LoginUserRequest $request)
    {
        $request->validated($request->all());

        if (!auth()->attempt($request->only('email', 'password'))) {
            return $this->errorResponse('Invalid credentials',401);
        }
        $userEmail = auth()->user()->email;
        $userToken = auth()->user()->createToken('API token for '.$userEmail,['*'],today()->addMonth())->plainTextToken;
        return $this->ok('Authentication successful',['token'=>$userToken]);
    }
    public function logout()
    {
        auth()->user()->currentAccessToken()->delete();
        return $this->ok('Logout successful');
    }
}
