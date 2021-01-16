<?php

namespace App\Http\Controllers;

use App\Beat;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class BeatController extends Controller
{
    //
    public function listAllBeat($id)
    {
        return response()->json(
            Beat::all(),
            HttpResponse::HTTP_OK
        );

    }

    public function listByCategory($id)
    {
        return response()->json(
            Beat::where('beat_category_id', (int) $id)->get(),
            HttpResponse::HTTP_OK
        );
    }

    public function store(Request $request)
    {
        return response()->json(
            Beat::create($request->all()),
            HttpResponse::HTTP_OK
        );
    }

    public function update(Request $request)
    {
        $id = $request->route('id');
        $data = $request->all();
        $beat = Beat::find($id);
        $beat->update($data);
        return response()->json(
            $beat,
            HttpResponse::HTTP_OK
        );
    }

    public function view($id)
    {
        return response()->json(
            Beat::find($id),
            HttpResponse::HTTP_OK
        );
    }

    public function delete($id)
    {
        return response()->json(
            Beat::find($id)->delete(),
            HttpResponse::HTTP_NO_CONTENT
        );
    }
}
