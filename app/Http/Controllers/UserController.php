<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use JWTAuth;
use Symfony\Component\HttpFoundation\Response as HttpResponse;
use Validator;

class UserController extends Controller
{
    //

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $email = $request->input('email');
        $password = bcrypt($request->input('password'));
        $credentials = array(
            'email' => $email,
            'password' => $password,
        );

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        return response()->json(compact('token'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validator = $this->validation($data);

        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);
        return response()->json(
            $user,
            HttpResponse::HTTP_OK
        );
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
