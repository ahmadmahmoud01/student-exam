<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function showForm()
    {
        return view('check_mark');
    }

    public function checkMark(Request $request)
    {
        $studentCode = $request->input('student_code');

        // Fetch the mark from the database
        $student = DB::table('students')->where('code', $studentCode)->first();

        if ($student) {
            return response()->json(['success' => true, 'mark' => $student->mark]);
        } else {
            return response()->json(['success' => false]);
        }
    }
}
