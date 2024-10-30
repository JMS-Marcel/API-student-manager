<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use Illuminate\Http\Request;

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
            'message' => 'fetching all data',
            'cours' => $cours
        ];
        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'nom'=> 'required|max:255',
            'description'=> 'required',
            'teacher_id' => 'required|exists:teachers,id'
        ]);
        
        $cours = Cours::create($validator);
        $data = [
            'status' => 200,
            'message' => 'data stored succesfully',
            'cours' => $cours
        ];
        return response()->json($data, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cours = Cours::findOrFail($id);
        $data = [
            'status'=>200,
            'cours' => $cours
        ];
        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = $request->validate([
            'nom'=> 'required|max:255',
            'description'=> 'required',
            'teacher_id' => 'required|exists:teachers,id'
        ]);
        
        $cours = Cours::findOrFail($id);

        $cours->update($validator);

        $data = [
            'status' => 200,
            'message' => 'data updated succesfully',
            'cours' => $cours
        ];
        return response()->json($data, 200);
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

