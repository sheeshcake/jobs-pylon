<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UserDetails;
use App\Models\User;

use Auth;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth:user');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_details = UserDetails::where("user_id", "=", Auth::user()->id)->get()->toArray();
        return view("layout.user.profile")->with("data", [
            "user_details" => $user_details[0]
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user_details = User::where("id", "=", $request->id)->get()->toArray();
        $profile_picture = $request->file('profile_picture');
        $profile_name = $user_details[0]["profile_image"];
        if($profile_picture){
            $profile_picture->move('img/profiles/', $profile_picture->getClientOriginalName());
            $profile_name = $profile_picture->getClientOriginalName();
        }
        $user_update = [
            "f_name" => $request->f_name,
            "l_name" => $request->l_name,
            "email" => $request->email,
            "profile_image" => $profile_name
        ];
        User::where("id", "=", $request->id)->update($user_update);
        UserDetails::where("user_id", "=", $request->id)->update($request->except(["f_name", "l_name", "email", "profile_picture", "_token", "id"]));
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
