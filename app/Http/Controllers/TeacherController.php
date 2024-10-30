<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teacher = Teacher::all();

        $data = [
            'status' => 200,
            'message' => 'Fetching all data',
            'teacher' => $teacher
        ];
        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Teacher $teacher)
    {
        $validator = $request->validate([
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'date_naissance' => 'required',
            'password' => 'required|confirmed',
            'phone' => 'required',
            'email' => 'required|email'
        ]);

        $validator['password'] = Hash::make($validator['password']);

        $teacher = Teacher::create($validator);

        $token = $teacher->createToken($request->nom);

        $data = [
            'status' => 200,
            'message' => 'data was stored succesfully',
            'token' => $token->plainTextToken,
            'teacher' => $teacher
        ];
        return response()->json($data, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        $data = [
            'status'=> 200,
            'techer'=> $teacher
        ];
        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        $validator = $request->validate([
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'date_naissance' => 'required',
            'password' => 'required|confirmed',
            'phone' => 'required',
            'email' => 'required|email'
        ]);

        $validator['password'] = Hash::make($validator['password']);

        $teacher->update($validator);

        $data = [
            'status' => 200,
            'message' =>"Teacher id: $teacher->id updated succesfully"
        ];

        return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        $data = [
            'status' => 200,
            'message' => "Teacher id: $teacher->id was deleted succesfully"
        ];

        return response()->json($data, 200);
    }
}
