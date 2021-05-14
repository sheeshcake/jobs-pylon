<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jobpost;

class SiteController extends Controller
{
    public function index(){
        $jobposts = Jobpost::orderBy('id', 'desc')->limit(6)->get();
        return view('layout.main')->with("data", [
            "jobposts" => $jobposts
        ]);
    }


    public function showall (){
        $jobposts = Jobpost::where('job_title', 'like', '%' . request()->search . '%')
                    ->orderBy('id', 'desc')->paginate(5);
        return view('layout.jobposts')->with("data", [
            "jobposts" => $jobposts
        ]);
    }

    public function show($id){
        $jobpost = Jobpost::where("id", "=", $id)->get();
        return view('layout.jobpost')->with("data", [
            "jobpost" => $jobpost
        ]);
    }

}
