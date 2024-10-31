<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;


class StudentController extends Controller implements HasMiddleware
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
        
        $student = Student::create($validator);

        $token = $student->createToken($request->nom);

        if ($request->has('courses')) {
            $student->cours()->attach($request->courses);
        }

        $data = [
            'status' => 200,
            'message' => 'Data stored succefully!',
            'token' => $token->plainTextToken,
            'relationship'=> $student->load('cours')
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
        Gate::authorize('modify', $student);

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

        if ($request->has('courses')) {
            $student->cours()->sync($request->courses);
        }

        $data = [
            'status'=> 200,
            'message'=> "Student id: $student->id update succesfully",
            'relationship'=> $student->load('cours')
        ];

        return response()->json($data,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        Gate::authorize('modify', $student);

        $student->delete();

        $data = [
            'status'=> 200,
            'message'=> "Student id: $student->id was deleted succesfully"
        ];
        return response()->json($data,200);
    }
}
