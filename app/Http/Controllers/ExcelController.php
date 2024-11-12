<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StudentsImport;

class ExcelController extends Controller
{
    public function importView()
    {
        return view('upload');
    }
    public function import(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        // Use the import class to import the data
        Excel::import(new StudentsImport, $request->file('file'));

        return redirect()->back()->with('success', 'Students data imported successfully!');
    }
}
