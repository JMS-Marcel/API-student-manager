<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class NoteController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            new Middleware('auth:sanctum', except: ['index', 'show']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $note = Note::all();

        $data = [
            'status'=> 200,
            'message' => 'fetching all data',
            'notes'=> $note
        ];

        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'valeur'=> 'required',
            'student_id'=> 'required|exists:students,id',
            'cours_id' => 'required|exists:cours,id'
        ]);

        $note = Note::create($validator);

        $data = [
            'status'=> 200,
            'message'=> 'Note stored succesfully',
            'note' => $note
        ];
        return response()->json($data, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        $data = [
            'status'=>200,
            'note'=> $note
        ];
        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        $validator = $request->validate([
            'valeur'=> 'required',
            'student_id'=> 'required|exists:students,id',
            'cours_id' => 'required|exists:cours,id'
        ]);

        $note->update($validator);

        $data = [
            'status'=> 200,
            'message'=> 'Note updated succesfully',
            'note'=> $note
        ];
        return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        $note->delete();

        $data = [
            'status'=>200,
            'message'=> 'note deleted succesfully'
        ];

        return response()->json($data, 200);
    }
}
