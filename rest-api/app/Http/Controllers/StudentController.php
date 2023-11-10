<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();

        if ($students->isEmpty()) {

            $data = [
                'message' => 'Resource is empty'
            ];

            return response()->json($data, 204);

        } else {

            $data = [
                'message' => 'Get All Students',
                'data' => $students
            ];

            return response()->json($data, 200);
        }

    }

    public function show($id)
    {
        $student = Student::find($id);

        if (!$student) {
            $data = [
                'message' => 'Student not found',
            ];

            return response()->json($data, 404);
        }

        $data = [
            'message' => 'Get detail student',
            'data' => $student,
        ];
        return response()->json($data, 200);

    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'email' => 'required|email',
            'jurusan' => 'required'
        ]);

        $student = Student::create($validateData);

        $data = [
            'message' => 'Student is Created Succesfully',
            'data' => $student,
        ];

        return response()->json($data, 201);
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);


        if (!$student) {

            $data = [
                'message' => 'Data not found'
            ];

            return response()->json($data, 404);
        }

        $input = [
            'nama' => $request->nama ?? $student->nama,
            'nim' => $request->nim ?? $student->nim,
            'email' => $request->email ?? $student->email,
            'jurusan' => $request->jurusan ?? $student->jurusan
        ];

        $student->update($input);

        $data = [
            'message' => 'Student updated successfully',
            'data' => $student
        ];

        return response()->json($data, 200);
    }

    public function destroy($id)
    {
        $student = Student::find($id);

        if (!$student) {

            $data = [
                'message' => 'Data not found'
            ];

            return response()->json($data, 404);
        }

        $student->delete();
        $data = [
            'message' => 'Student deleted succesfully',
            'data' => $student
        ];
        return response()->json($data, 200);
    }
}


