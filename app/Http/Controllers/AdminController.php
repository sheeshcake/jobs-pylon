<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Application;
use App\Models\Jobpost;

use Auth;


class AdminController extends Controller
{


    public function __construct(){
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applicants = Application::where("application_status", "=", "pending")->get()->toArray();
        $onboard = Application::where("application_status", "=", "onboard")->get()->toArray();
        $all = Application::all()->toArray();
        $jobposts = Jobpost::all()->toArray();
        foreach($jobposts as $index => $jobpost){
            $applicant = Application::where("jobpost_id", "=", $jobpost["id"])->get()->toArray();
            $jobposts[$index]["applicants_count"] = count($applicant);
        }
        // $barchart_data;
        // foreach($jobposts as $index => $jobpost){
        //     $applicant = Application::where("jobpost_id", "=", $jobpost["id"])->get()->toArray();
        //     $barchart_data["labels"][$index] = $jobpost["job_title"];
        //     $barchart_data["data"]["index"] = count($applicant);

        // }
        return view('layout.admin.dashboard')->with("data", [
            "applicants" => $applicants,
            "onboard" => $onboard,
            "all" => $all,
            "jobposts" => $jobposts
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
