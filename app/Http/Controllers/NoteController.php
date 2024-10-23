<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $note = Note::all();
        $data = [
            'status' => 200,
            'message' => 'fetching data',
            'note' => $note
        ];

        return response()->json($data, 200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'valeur' => 'required'
            ]
        );
        if ($validator->fails()) {
            $data = [
                'status' => 422,
                'message' => $validator->messages()
            ];
            return response()->json($data, 422);
        } else {
            $note = new Note;

            $note->valeur = $request->valeur;

            $note->save();

            $data = [
                'status' => 200,
                'message' => 'data stored succesfully'
            ];

            return response()->json($data, 200);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'valeur' => 'required'
            ]
        );
        if ($validator->fails()) {
            $data = [
                'status' => 422,
                'message' => $validator->messages()
            ];
            return response()->json($data, 422);
        } else {
            $note = Note::findOrFail($id);

            $note->valeur = $request->valeur;

            $note->save();

            $data = [
                'status' => 200,
                'message' => "Note id: $id updated succesfully"
            ];

            return response()->json($data, 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $note = Note::findOrFail($id);

        $note->delete();

        $data = [
            'status'=> 200,
            'message'=> "Note id: $id is deleted succesfully"
        ];

        return response()->json($data, 200);
    }
}
