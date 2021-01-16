<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response as HttpResponse;
use Validator;

class UserController extends Controller
{
    //

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (!$token = auth('api')->attempt($credentials)) {return response()->json(['error' => 'Unauthorized'], 401);}

        return response()->json(
            $this->createNewToken($token),
            HttpResponse::HTTP_OK
        );
    }

    protected function createNewToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        try {
            $validated = $request->validate([
                'email' => 'required|unique:users|max:255',
                'password' => 'required',
            ]);

            $data['password'] = Hash::make($data['password']);

            $user = User::create($data);
            return response()->json(
                $user,
                HttpResponse::HTTP_OK
            );} catch (\Throwable $th) {
            //throw $th;

            return response()->json(
                "User data is required",
                HttpResponse::HTTP_EXPECTATION_FAILED
            );

        }

    }

    public function delete($id)
    {
        return response()->json(
            User::find($id)->delete(),
            HttpResponse::HTTP_NO_CONTENT
        );
    }

    public function update(Request $request)
    {
        $user_id = $request->route('id');
        $user = User::find($user_id)->update($request->all());

        return response()->json(
            $user,
            HttpResponse::HTTP_OK
        );
    }
}
