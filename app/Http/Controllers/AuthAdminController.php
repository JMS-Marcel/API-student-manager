<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthAdminController extends Controller
{
    public function login(Request $request)
    {
        $validator = $request->validate([
            'email'=> 'required|email|exists:admins',
            'password'=> 'required',
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if(!$admin || !Hash::check($request->password, $admin->password)){
            return [
                'status' => 422,
                'message' => 'password incorrect'
            ];
        }

        $token = $admin->createToken($admin->nom);

        $data = [
            'status' => 200,
            'message' => 'Admin login succesfully',
            'admin' => $admin,
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
