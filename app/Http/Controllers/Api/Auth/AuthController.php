<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function user(Request $request)
    {
        $user = User::find($request->user()->id);

        $response = [
            'data' => new UserResource($user),
        ];

        return response()->json($response, 200);
    }


    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return response()->json([
            'message' => 'User Logged Out!'
        ], 200, [], JSON_NUMERIC_CHECK);
    }
}
