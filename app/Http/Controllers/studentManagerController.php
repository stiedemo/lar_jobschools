<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class studentManagerController extends Controller
{
    public function actionHomeManager()
    {
        return view('Manager.Student.index');
    }
}
