<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SignInController extends Controller
{
    public function index(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'email' => 'required|string',
            'password' => 'required|string|min:8'
        ]);

        if ($validation->fails()) {
            return response()->json([
                "errors" => $validation->errors()
            ], 400, [], JSON_NUMERIC_CHECK);
        }

        Auth::attempt(array('email' => $request->email, 'password' => $request->password));

        $user = $request->user();

        $response = [
            "token" => $user->createToken('NetflixMirror')->accessToken,
            "data" => new UserResource($user),
        ];

        return response()->json($response, 200);
    }
}
