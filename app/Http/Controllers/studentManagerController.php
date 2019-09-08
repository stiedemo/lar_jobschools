<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\StudentsExport;
use App\Imports\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;

class studentManagerController extends Controller
{
    public function actionHomeManager()
    {
        return view('Manager.Student.index');
    }

    public function exportStudenMe()
    {
        return Excel::download(new StudentsExport, 'my_students.xlsx');
    }
    public function importStudenMe(Request $request) 
    {
        Excel::import(new StudentsImport, request()->file('file'));
        
        return back();
    }
}
