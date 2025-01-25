<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\trait\apiResponseUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\userRequest;
use App\Models\User;

class AuthController extends Controller
{
    use apiResponseUser;
    public function register(userRequest $request) {

        $fields=$request->validated();

        $input = $fields;
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['user'] =  $user;

        return $this->apiResponse($success, 'User register successfully.',200);
    }


    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return $this->apiResponse(null, 'Unauthorised.',401);
        }

        $success = $this->respondWithToken($token);

        return $this->apiResponse($success, 'User login successfully.',200);
    }

    public function profile()
    {
        $success = auth()->user();

        return $this->apiResponse($success, 'Refresh token return successfully.',200);
    }

    public function logout()
    {
        auth()->logout();

        return $this->apiResponse([], 'Successfully logged out.',200);
    }

    public function refresh()
    {
        $success = $this->respondWithToken(auth()->refresh());

        return $this->apiResponse($success, 'Refresh token return successfully.',200);
    }

    protected function respondWithToken($token)
    {
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ];
    }
}
