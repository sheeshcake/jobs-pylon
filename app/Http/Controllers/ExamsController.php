<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Exam;
use App\Models\Application;

use Hash;

class ExamsController extends Controller
{

    public function index(){
        $exams = Exam::paginate(15);
        return view('layout.admin.exams')->with("data", [
            "exams" => $exams
        ]);
    }

    public function newexam(){


    }


    public function removeexam(){

    }
}
