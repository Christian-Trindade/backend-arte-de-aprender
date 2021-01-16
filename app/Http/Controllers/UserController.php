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

    public function __construct()
    {
        $this->middleware('api', ['except' => ['login', 'store']]);
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (!$token = auth()->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->createNewToken($token);
    }

    protected function createNewToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'user' => auth()->user(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        try {
          
            $validator = Validator::make($request->all(), [
                'email' => 'required|unique:users|email',
                'password' => 'required|string|min:6',
            ]);

            $data['password'] = Hash::make($data['password']);

            $user = User::create($data);
            if (!$token = auth()->attempt($validator->validated())) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
            return response()->json(
                $this->createNewToken($token),
                HttpResponse::HTTP_OK
            );} catch (\Throwable $th) {
            //throw $th;

            return response()->json(
               $th,
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
        $user = User::find($user_id);
        $data = $request->all();
        try {
            $validated = $request->validate([
                'email' => 'required|max:255',
                'password' => 'required',
            ]);

            $data['password'] = Hash::make($data['password']);

            $user->update($data);
            return response()->json(
                $user,
                HttpResponse::HTTP_OK
            );
        } catch (\Throwable $th) {
            //throw $th;

            return response()->json(
                "User data is required",
                HttpResponse::HTTP_EXPECTATION_FAILED
            );

        }

        return response()->json(
            $user,
            HttpResponse::HTTP_OK
        );
    }

    public function view($id)
    {
        return response()->json(
            User::find($id),
            HttpResponse::HTTP_OK
        );

    }

    public function logout()
    {
        Auth::guard('api')->logout();

        return response()->json(['message' => 'User successfully signed out']);
    }

    public function me()
    {
        return response()->json(
            Auth::user(),
            HttpResponse::HTTP_OK
        );
    }
}
