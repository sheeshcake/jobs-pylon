<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Application;
use App\Models\Jobpost;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApproveMail;

use Hash;

class ApplicationController extends Controller
{
    public function index(){
        $applications = Application::paginate(15);
        return view('layout.admin.applicants')->with("data", [
            "applications" => $applications
        ]);
    }

    public function show($id){
        $application = Application::where("id", "=", $id)->get()->toArray();
        $jobpost = Jobpost::where("id", "=", $application[0]['jobpost_id'])->get();
        $resume_ext = explode('.', $application[0]['resume_file']);
        $appication_ext = explode('.', $application[0]['application_file']);
        $application[0]['resume_ext'] = $resume_ext[1];
        $application[0]['application_ext'] = $appication_ext[1];
        return view('layout.admin.showapplication')->with("data", [
            "application" => $application,
            "jobpost" => $jobpost
        ]);
    }

    public function create(Request $request){
        $resume = $request->file('resume_file');
        $application = $request->file('application_file');
        $file = $request->file('job_image');
        $resume_name = "none.docx";
        $application_name = "none.docx";
        if($resume){
            $resume->move('files', $resume->getClientOriginalName());
            $resume_name = $resume->getClientOriginalName();
        }
        if($application){
            $application->move('files', $application->getClientOriginalName());
            $application_name = $application->getClientOriginalName();
        }
        $data = Application::create([
            "jobpost_id" => $request->jobpost_id,
            "exam_id" => 1,
            "email" => $request->email,
            "address" => $request->address,
            "contact_number" => $request->contact_number,
            "f_name" => $request->f_name,
            "l_name" => $request->l_name,
            "resume_file" => $resume_name,
            "application_file" => $application_name,
            "application_status" => "pending"
        ]);
        if($data){
            return redirect()->back()->with("msg", "Application Submitted!");
        }
    }

    public function approve(Request $request){
        $application = Application::where("id", "=", $request->application_id)->get()->toArray();
        $data = 
        $token = Hash::make($application[0]["email"]);
        $email = $application[0]["email"];
        $data = [
            "token" => $token,
            "email" => $email
        ];
        Mail::to($email)->send(new ApproveMail($data));
        return "Email sent!";
    }
}
