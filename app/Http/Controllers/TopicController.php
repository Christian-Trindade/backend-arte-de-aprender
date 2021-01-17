<?php

namespace App\Http\Controllers;

use App\Audio;
use App\Topic;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class TopicController extends Controller
{
    //
    public function listTopic($id)
    {
        $topics = Topic::where('subject_id', $id)->get();
        $topics->each(function ($topic) {
            $topic->qty_audio = Audio::where('topic_id', $topic->id)->get()->count();
        });
        return response()->json(
            $topics,
            HttpResponse::HTTP_OK
        );

    }

    public function view($id)
    {
        return response()->json(
            Topic::find($id),
            HttpResponse::HTTP_OK
        );
    }

}
