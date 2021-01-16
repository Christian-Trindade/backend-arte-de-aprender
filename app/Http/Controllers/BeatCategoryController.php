<?php

namespace App\Http\Controllers;

use App\BeatCategory;
use Illuminate\Http\Request;
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

    public function store(Request $request)
    {
        return response()->json(
            BeatCategory::create($request->all()),
            HttpResponse::HTTP_OK
        );
    }

    public function update(Request $request)
    {
        $id = $request->route('id');
        $data = $request->all();
        $beatCategory = BeatCategory::find($id);
        $beatCategory->update($data);
        return response()->json(
            $beatCategory,
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

    public function delete($id)
    {
        return response()->json(
            BeatCategory::find($id)->delete(),
            HttpResponse::HTTP_NO_CONTENT
        );
    }
}
