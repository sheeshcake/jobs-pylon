<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Application;
use App\Models\Exam;

use Hash;

class TakeExamController extends Controller
{
    public function exam(Request $request){
        if(Hash::check($request->email, $request->token)){
            $application = Application::where("email", "=", $request->email)->get()->toArray();
            if($application[0]["application_status"] == "onboard"){
                $exam = Exam::where("jobpost_id", "=", $application[0]['jobpost_id'])->get()->toArray();
                $exam_data = explode('&', $exam[0]['exam_description']);
                $parts = parse_url($exam[0]['exam_description'], PHP_URL_QUERY);
                $email_name = "";
                parse_str($parts, $query);
                foreach($query as $key => $q){
                    if(str_contains($key, 'entry')) $email_name = str_replace('_', '.', $key);
                }
                return view("layout.exam")->with("data", [
                    "email" => $request->email,
                    "email_name" => $email_name,
                    "exam_data" => $exam_data[0],
                    "exam_link" => $exam[0]['exam_description']
                ]);
            }else{
                return view("layout.examdone");
            }
        }else{
            return view("layout.examdone");
        }
    }
}
