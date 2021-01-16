<?php

namespace App\Http\Controllers;

use App\Subject;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class SubjectController extends Controller
{
    //
    public function listSubject()
    {
        return response()->json(
            Subject::all(),
            HttpResponse::HTTP_OK
        );

    }

    public function store(Request $request)
    {
        return response()->json(
            Subject::create($request->all()),
            HttpResponse::HTTP_OK
        );
    }

    public function update(Request $request)
    {
        $id = $request->route('id');
        $data = $request->all();
        $subject = Subject::find($id);
        $subject->update($data);
        return response()->json(
            $subject,
            HttpResponse::HTTP_OK
        );
    }

    public function view($id)
    {
        return response()->json(
            Subject::find($id),
            HttpResponse::HTTP_OK
        );
    }

    public function delete($id)
    {
        return response()->json(
            Subject::find($id)->delete(),
            HttpResponse::HTTP_NO_CONTENT
        );
    }
}
