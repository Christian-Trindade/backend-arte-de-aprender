<?php

namespace App\Http\Controllers;

use App\BeatCategory;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class BeatCategoryController extends Controller
{
    //
    public function listBeatCategory()
    {
        return response()->json(
            BeatCategory::all(),
            HttpResponse::HTTP_OK
        );

    }

    public function getByStatus($id)
    {
        return response()->json(
            BeatCategory::where('active', (int) $id)->get(),
            HttpResponse::HTTP_OK
        );
    }

    public function view($id)
    {
        return response()->json(
            BeatCategory::find($id),
            HttpResponse::HTTP_OK
        );
    }

}
