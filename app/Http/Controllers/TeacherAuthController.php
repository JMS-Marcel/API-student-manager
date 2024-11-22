<?php

namespace App\Http\Controllers;


use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherAuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = $request->validate([
            'email'=> 'required|email|exists:teachers',
            'password'=> 'required',
        ]);

        $teacher = Teacher::where('email', $request->email)->first();

        if(!$teacher || !Hash::check($request->password, $teacher->password)){
            $data = [
                'status' => 422,
                'message' => 'password incorrect'
            ];
            return response()->json($data, 422);
        }

        $token = $teacher->createToken($teacher->nom);

        $data = [
            'status' => 200,
            'message' => 'Teacher login succesfully',
            'teacher' => $teacher,
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
