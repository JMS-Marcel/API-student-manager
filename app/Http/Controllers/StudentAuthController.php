<?php

namespace App\Http\Controllers;


use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentAuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = $request->validate([
            'email'=> 'required|email|exists:students',
            'password'=> 'required',
        ]);

        $student = Student::where('email', $request->email)->first();

        if(!$student || !Hash::check($request->password, $student->password)){
            $data = [
                'status' => 422,
                'message' => 'password incorrect'
            ];
            return response()->json($data, 422);
        }

        $token = $student->createToken($student->nom);

        $data = [
            'status' => 200,
            'message' => 'Student login succesfully',
            'student' => $student,
            'token' => $token->plainTextToken
        ];

        return response()->json($data, 200);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        $data = [
            'status' => 200,
            'message' => 'You are logged out'
        ];

        return response()->json($data, 200);
    }

}
