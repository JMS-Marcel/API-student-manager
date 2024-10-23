<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CoursController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cours = Cours::all();
        $data = [
            'status' => 200,
            'message' => 'fetchig data',
            'cours' => $cours
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
                'nom' => 'required'
            ]
        );
        if ($validator->fails()) {
            $data = [
                'status' => 422,
                'message' => $validator->messages()
            ];

            return response()->json($data, 422);
        } else {

            $cours = new Cours;

            $cours->nom = $request->nom;

            $cours->save();

            $data = [
                'status' => 200,
                'message' => "cours stored succesfully"
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
                'nom' => 'required'
            ]
        );
        if ($validator->fails()) {
            $data = [
                'status' => 422,
                'message' => $validator->messages()
            ];

            return response()->json($data, 422);
        } else {

            $cours = Cours::findOrFail($id);

            $cours->nom = $request->nom;

            $cours->save();

            $data = [
                'status' => 200,
                'message' => "cours id: $id updated succesfully"
            ];

            return response()->json($data, 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cours = Cours::findOrFail($id);

        $cours->delete();

        $data = [
            'status'=>200,
            'message'=> "cours id: $id is deleted succesfully"
        ];

        return response()->json($data, 200);
    }
}
