<?php

namespace App\Http\Controllers;

use App\Beat;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class BeatController extends Controller
{
    //
    public function listAllBeat()
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

    public function view($id)
    {
        return response()->json(
            Beat::find($id),
            HttpResponse::HTTP_OK
        );
    }
}
