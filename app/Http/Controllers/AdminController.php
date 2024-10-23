<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = Admin::all();

        $data = [
            'status' => 200,
            'admin' => $admin
        ];

        return response()->json($data, 200);

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'nom'=> 'required',
            'prenom' => 'required',
            'date_naissance' => 'required',
            'password' => 'required',
            'phone' => 'required',
            'email' => 'required | email',
        ]
    );
    if($validator->fails()){
        $data = [
            'status' => 422,
            'message'=> $validator->messages()
        ];

        return response()->json($data, 422);
    }else{
        $admin = new Admin;

        $admin->nom = $request->nom;
        $admin->prenom = $request->prenom;
        $admin->date_naissance = $request->date_naissance;
        $admin->password = $request->password;
        $admin->phone = $request->phone;
        $admin->email = $request->email;

        $admin->save();

        $data = [
            'status' => 200,
            'message' => 'Data stored succefully' 
        ];

        return response()->json($data, 200);

    }

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(),
        [
            'nom'=> 'required',
            'prenom' => 'required',
            'date_naissance' => 'required',
            'password' => 'required',
            'phone' => 'required',
            'email' => 'required | email',
        ]
    );
    if($validator->fails()){
        $data = [
            'status' => 422,
            'message'=> $validator->messages()
        ];

        return response()->json($data, 422);


    }else{
        $admin = Admin::findOrFail($id);

        $admin->nom = $request->nom;
        $admin->prenom = $request->prenom;
        $admin->date_naissance = $request->date_naissance;
        $admin->password = $request->password;
        $admin->phone = $request->phone;
        $admin->email = $request->email;

        $admin->save();

        $data = [
            'status' => 200,
            'message' => 'Data update succefully' 
        ];

        return response()->json($data, 200);

    }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $admin = Admin::findOrFail($id);

        $admin->delete();
        $data =[
            'status'=> 200,
            'message'=> "admin id: $id is deleted succesfully"
        ];
        return response()->json($data, 200);
    }
}
