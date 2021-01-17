<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class LikeController extends Controller
{

    public function getLikesByAudio($id)
    {
        return response()->json(
            Like::where('audio_id', (int) $id)->get()->cout(),
            HttpResponse::HTTP_OK
        );
    }

    public function store(Request $request)
    {
        Like::create($request->all());
        $audio_id = $request->input('audio_id');
        return response()->json(
            $this->getCountLike($audio_id),
            HttpResponse::HTTP_OK
        );
    }

    private function getCurrentLike($audio_id, $user_id)
    {
        return Like::where('audio_id', $audio_id)->where('user_id', $user_id)->first();
    }

    private function getCountLike($id)
    {
        return Like::where('audio_id', (int) $id)->get()->count();
    }

    public function delete(Request $request)
    {
        $audio_id = $request->input('audio_id');
        $user_id = $request->input('user_id');
        $like = $this->getCurrentLike($audio_id, $user_id);
        if ($like) {
            $like->delete();
        }

        return response()->json(
            $this->getCountLike($audio_id),
            HttpResponse::HTTP_OK
        );
    }
}
