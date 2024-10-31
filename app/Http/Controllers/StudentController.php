<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index() {
        // menampilkan data students dari database
        $students = Student::all();

        $data = [
            'message' => 'Get all students',
            'data' => $students
        ];

        return response()->json($data, 200);
    }
    public function store(Request $request) {
        // menangkap data request
        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan
        ];

        // menggunakan model student untuk insert data
        $student = Student::create($input);

        $data = [
            'message' => 'Student is created succesfully',
            'data' => $student,
        ];

        // mengembalikan data (json) dan kode 201
        return response()->json($data, 201);
    }
    public function update(Request $request, $id) {
        // Cari data student berdasarkan id
        $student = Student::find($id);

        // Jika student tidak ditemukan, kembalikan pesan error
        if (!$student) {
            return response()->json([
                'message' => 'Student not found'
            ], 404);
        }

        // Update data student
        $student->update([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan
        ]);

        $data = [
            'message' => 'Student is updated successfully',
            'data' => $student
        ];

        // Mengembalikan data (json) dan kode 200
        return response()->json($data, 200);
    }

    public function destroy($id) {
        // Cari data student berdasarkan id
        $student = Student::find($id);

        // Jika student tidak ditemukan, kembalikan pesan error
        if (!$student) {
            return response()->json([
                'message' => 'Student not found'
            ], 404);
        }

        // Hapus data student
        $student->delete();

        $data = [
            'message' => 'Student is deleted successfully'
        ];

        // Mengembalikan pesan sukses dan kode 200
        return response()->json($data, 200);
    }   
}


