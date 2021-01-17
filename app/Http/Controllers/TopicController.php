<?php

namespace App\Http\Controllers;

use App\Topic;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class TopicController extends Controller
{
    //
    public function listTopic($id)
    {
        return response()->json(
            Topic::where('subject_id', $id)->get(),
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
