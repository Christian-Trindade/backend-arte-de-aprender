<?php

namespace App\Http\Controllers;

use App\Audio;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class AudioController extends Controller
{
    //
    public function listByTopic($id)
    {
        return response()->json(
            Audio::where('topic_id', $id)->get(),
            HttpResponse::HTTP_OK
        );

    }

    public function listByUser($id)
    {
        return response()->json(
            Audio::where('user_id', (int) $id)->get(),
            HttpResponse::HTTP_OK
        );
    }
    public function listByBeat($id)
    {
        return response()->json(
            Audio::where('beat_id', (int) $id)->get(),
            HttpResponse::HTTP_OK
        );
    }

    public function store(Request $request)
    {
        $audio = Audio::create($request->all());
        $topic_id = $request->input('topic_id');
        $user_id = $request->input('user_id');

        $audio_url = "topic/" . $topic_id . "/user/" . $user_id;
        $path = $this->request->file('audio')->store($audio_url, 's3');

        $audio->url = basename($path);
        $audio->save();
        return response()->json(
            $audio,
            HttpResponse::HTTP_OK
        );
    }

    public function update(Request $request)
    {
        $id = $request->route('id');
        $audio = Audio::find($id);
        $audio->name = $request->input('name');
        $audio->save();
        return response()->json(
            $audio,
            HttpResponse::HTTP_OK
        );
    }

    public function view($id)
    {
        return response()->json(
            Audio::find($id),
            HttpResponse::HTTP_OK
        );
    }

    public function delete($id)
    {
        return response()->json(
            Audio::find($id)->delete(),
            HttpResponse::HTTP_NO_CONTENT
        );
    }
}
