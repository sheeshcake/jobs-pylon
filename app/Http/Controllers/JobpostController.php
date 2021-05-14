<?php

namespace App\Http\Controllers;

use App\Models\Jobpost;
use App\Models\Exam;
use Auth;

use Illuminate\Http\Request;

class JobpostController extends Controller
{
    public function __contstruct(){
        $this->middleware('auth:admin');
    }

    public function index(){
        $posts = Jobpost::paginate(10);
        return view("layout.admin.jobposts")
                ->with("data", [
                    "posts" => $posts
                ]);
    }

    public function create(){
        $id = Jobpost::create([
            "job_title" => "New Job Post",
            "job_description" => "",
            "job_image" => "noimage.png"
        ])->id;
        Exam::create([
            "jobpost_id" => $id,
            "exam_description" => "",
            "exam_name" => ""
        ]);
        return redirect(route("admin.jobpost", $id));
    }

    public function update(Request $request){
        // dd($request->file('job_image'));
        $file = $request->file('job_image');
        $job_image = "none.png";
        if($file){
            $file->move('img/jobimages', $file->getClientOriginalName());
            $job_image = $file->getClientOriginalName();
        }
        Exam::where("jobpost_id", "=", $request->id)
            ->update([
                "exam_name" => $request->exam_name,
                "exam_description" => $request->exam_description
            ]);
        Jobpost::where("id", "=", $request->id)
            ->update([
                "job_title" => $request->job_title,
                "job_description" => $request->job_description,
                "job_image" => $job_image,
            ]);
        return redirect(route("admin.jobpost", $request->id));
    }

    public function show($id){
        $posts = Jobpost::where("id", "=", $id)->get();
        $exam = Exam::where("jobpost_id", "=", $id)->get();
        return view("layout.admin.jobpost")->with("data", [
            "posts" => $posts,
            "exam" => $exam
        ]);

    }

    public function delete($id){
        Jobpost::where("id", "=", $id)->delete();
        return redirect(route('admin.jobposts'))->with("alert", [
            "msg" => "Post Deleted!",
            "status" => "success"
        ]);
    }

}
