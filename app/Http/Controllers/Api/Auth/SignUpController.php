<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SignUpController extends Controller
{
    public function index(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string',
            'phone_number' => 'required|numeric|unique:users',
            'country_iso_code' => 'required|string',
            'country_code' => 'required|string',
            'password' => 'required|string|min:8|confirmed'
        ]);

        if ($validation->fails()) {
            return response()->json([
                "errors" => $validation->errors()
            ], 400, [], JSON_NUMERIC_CHECK);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->country_code = $request->country_code;
        $user->country_iso_code = $request->country_iso_code;
        $user->password = bcrypt($request->password);
        $user->save();

        Auth::attempt(array('email' => $request->email, 'password' => $request->password));

        $response = [
            "token" => $user->createToken('NetflixMirror')->accessToken,
            "data" => new UserResource($user),
        ];

        return response()->json($response, 200);
    }
}
