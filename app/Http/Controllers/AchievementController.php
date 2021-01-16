<?php

namespace App\Http\Controllers;

use App\Achievement;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class AchievementController extends Controller
{
    //
    public function listAllAchievement()
    {
        return response()->json(
            Achievement::all(),
            HttpResponse::HTTP_OK
        );

    }


    public function store(Request $request)
    {
        return response()->json(
            Achievement::create($request->all()),
            HttpResponse::HTTP_OK
        );
    }

    public function update(Request $request)
    {
        $id = $request->route('id');
        $data = $request->all();
        $beat = Achievement::find($id);
        $beat->update($data);
        return response()->json(
            $beat,
            HttpResponse::HTTP_OK
        );
    }

    public function view($id)
    {
        return response()->json(
            Achievement::find($id),
            HttpResponse::HTTP_OK
        );
    }

    public function delete($id)
    {
        return response()->json(
            Achievement::find($id)->delete(),
            HttpResponse::HTTP_NO_CONTENT
        );
    }
}
