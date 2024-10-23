<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
        $validator = Validator::make($request->all(),[
            'nom' => 'required',
            'prenom' => 'required',
            'date_naissance' => 'required',
            'password' => 'required',
            'matricule' => 'required',
            'phone' => 'required',
            'email' => 'required | email',
        ]);

        if($validator->fails()){
            $data = [
                'status'=>422,
                'errors'=> $validator->errors(),
            ];

            return response($data, 422);
        }else{
            $student = new Student;

            $student->nom = $request->nom;
            $student->prenom = $request->prenom;
            $student->date_naissance = $request->date_naissance;
            $student->password = bcrypt($request->password);
            $student->matricule = $request->matricule;
            $student->phone = $request->phone;
            $student->email = $request->email;

            $student->save();

            $data = [
                'status' => 200,
                'message' => 'Data stored succefully!',
            ];

            return response()->json($data, 200);
        }
    }

  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(),[
            'nom' => 'required',
            'prenom' => 'required',
            'date_naissance' => 'required',
            'password' => 'required',
            'matricule' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
        ]);

        if($validator->fails()){
            $data = [
                'status'=>422,
                'errors'=> $validator->errors(),
            ];

            return response($data, 422);
        }else{
            try {
                $student = Student::findOrFail($id);
            } catch (ModelNotFoundException $e) {
                return response()->json([
                    'status' => 404,
                    'message' => 'Student not found',
                ], 404);
            }

            $student->nom = $request->nom;
            $student->prenom = $request->prenom;
            $student->date_naissance = $request->date_naissance;
            $student->password = bcrypt($request->password);
            $student->matricule = $request->matricule;
            $student->phone = $request->phone;
            $student->email = $request->email;

            $student->save();

            $data = [
                'status' => 200,
                'message' => 'Data updated succefully!',
            ];

            return response()->json($data, 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $student = Student::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => 404,
                'message' => 'Student not found',
            ], 404);
        }

        $student->delete();

        $data = [
            'status' => 200,
            'message' => "student id: $id is deleted succefully!",
        ];

        return response()->json($data, 200);

    }
}
