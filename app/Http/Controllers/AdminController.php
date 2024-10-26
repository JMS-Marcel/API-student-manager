<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = Admin::all();

        $data = [
            'status'=>200,
            'message'=> 'fetching all data',
            'admin' => $admin
        ];
        return response($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'nom'=> 'required|max:255',
            'prenom'=> 'required|max:255',
            'date_naissance'=> 'required',
            'password'=> 'required|confirmed',
            'phone'=> 'required',
            'email'=> 'required|email',
        ]);
        
        $validator['password'] = Hash::make($validator['password']);

        Admin::create($validator);
        $data = [
            'status' => 200,
            'message' => 'data stored succesfully'
        ];
        return response()->json($data, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        $data = [
            'status'=>200,
            'admin' => $admin
        ];
        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        $validator = $request->validate([
            'nom'=> 'required|max:255',
            'prenom'=> 'required|max:255',
            'date_naissance'=> 'required',
            'password'=> 'required|confirmed',
            'phone'=> 'required',
            'email'=> 'required|email',
        ]);
        
        $validator['password'] = Hash::make($validator['password']);

        $admin->update($validator);
        $data = [
            'status' => 200,
            'message' => 'data updated succesfully'
        ];
        return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();
        $data = [
            'status'=> 200,
            'message' => 'data deleted succesfully'
        ];

        return response()->json($data, 200);
    }
}
