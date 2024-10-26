<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student = Student::all();
        $data = [
            'status' => 200,
            'message' => 'data fetching',
            'student' => $student
            
        ];
        return response()->json($data,200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'date_naissance' => 'required',
            'password' => 'required|confirmed',
            'matricule' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'adresse' => 'required',
        ]);

        $validator['password'] = Hash::make($validator['password']);
        
        Student::create($validator);

        $data = [
            'status' => 200,
            'message' => 'Data stored succefully!'
        ];

        return response()->json($data, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $data = [
            'status' => 200,
            'student' =>$student
        ];

        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $validator = $request->validate([
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'date_naissance' => 'required',
            'password' => 'required|confirmed',
            'matricule' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'adresse' => 'required',

        ]);

        $student->update($validator);

        $data = [
            'status'=> 200,
            'message'=> "Student id: $student->id update succesfully"
        ];

        return response()->json($data,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        $data = [
            'status'=> 200,
            'message'=> "Student id: $student->id was deleted succesfully"
        ];
        return response()->json($data,200);
    }
}
