<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teacher = Teacher::all();

        $data = [
            'status'=>200,
            'message'=> 'fetching data',
            'teacher'=> $teacher
        ];

        return response()->json($data, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
                'status'=> 422,
                'message'=> $validator->messages(),
            ];

            return response()->json($data, 422);
        }else{
            $teacher = new Teacher;

            $teacher->nom = $request->nom;
            $teacher->prenom = $request->prenom;
            $teacher->date_naissance = $request->date_naissance;
            $teacher->password = $request->password;
            $teacher->phone = $request->phone;
            $teacher->email = $request->email;

            $teacher->save();

            $data = [
                'status' => 200,
                'message' => 'data stored succefully'
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
                'status'=> 422,
                'message'=> $validator->messages(),
            ];

            return response()->json($data, 422);
        }else{
            $teacher = Teacher::findOrFail($id);

            $teacher->nom = $request->nom;
            $teacher->prenom = $request->prenom;
            $teacher->date_naissance = $request->date_naissance;
            $teacher->password = $request->password;
            $teacher->phone = $request->phone;
            $teacher->email = $request->email;

            $teacher->save();

            $data = [
                'status' => 200,
                'message' => 'data updated succefully'
            ];

            return response()->json($data, 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $teacher = Teacher::findOrFail($id);

        $teacher->delete();

        $data = [
            'status'=> 200,
            'message' => "teacher id: $id is deleted succefully",
        ];

        return response()->json($data, 200);
    }
}
