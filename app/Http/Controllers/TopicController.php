<?php

namespace App\Http\Controllers;

use App\Topic;
use Illuminate\Http\Request;
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

    public function store(Request $request)
    {
        $topic = Topic::create($request->all());
        $subject_id = $request->input('subject_id');
        $image_url = "category/" . $subject_id;
        $path = $request->file('image')->store($image_url, 's3');
        $topic->url = basename($path);
        $topic->save();
        return response()->json(
            $topic,
            HttpResponse::HTTP_OK
        );
    }

    public function update(Request $request)
    {
        $id = $request->route('id');
        $data = $request->all();
        $topic = Topic::find($id);
        $topic->update($data);

        $subject_id = $request->input('subject_id');
        $image_url = "category/" . $subject_id;
        $path = $this->request->file('image')->store($image_url, 's3');
        $topic->url = basename($path);
        $topic->save();

        return response()->json(
            $topic,
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

    public function delete($id)
    {
        return response()->json(
            Topic::find($id)->delete(),
            HttpResponse::HTTP_NO_CONTENT
        );
    }
}
