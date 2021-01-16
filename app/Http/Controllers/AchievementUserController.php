<?php

namespace App\Http\Controllers;

use App\AchievementUser;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class AchievementUserController extends Controller
{
    //
    public function listAchievementUser($id)
    {
        return response()->json(
            AchievementUser::where('user_id', $id)->get(),
            HttpResponse::HTTP_OK
        );

    }

    public function listAchievementAllUsers($id)
    {
        return response()->json(
            AchievementUser::where('achievement_id', $id)->get(),
            HttpResponse::HTTP_OK
        );

    }

    public function store(Request $request)
    {
        return response()->json(
            AchievementUser::create($request->all()),
            HttpResponse::HTTP_OK
        );
    }

    public function update(Request $request)
    {
        $id = $request->route('id');
        $data = $request->all();
        $beat = AchievementUser::find($id);
        $beat->update($data);
        return response()->json(
            $beat,
            HttpResponse::HTTP_OK
        );
    }

    public function view($id)
    {
        return response()->json(
            AchievementUser::find($id),
            HttpResponse::HTTP_OK
        );
    }

    public function delete($id)
    {
        return response()->json(
            AchievementUser::find($id)->delete(),
            HttpResponse::HTTP_NO_CONTENT
        );
    }

}
