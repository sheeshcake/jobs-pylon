<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Application;

use Socialite;
use Hash;
use Auth;

class ServiceAuthController extends Controller
{
    /**
     * 
     *
     * @return Response
     */
    public $service;

    public function redirectToProvider($service)
    {
        $this->service = $service;
        return Socialite::driver($service)->redirect();
    }

    /**
     * 
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();
        $application = Application::where("email", "=", $user->email)->get()->toArray();
        $credentials = [
            "username" => $user->email,
            "password" => $user->email . $user->user['family_name']
        ];
        if($application[0]['application_status'] == "onboard"){
            if (Auth::guard('user')->attempt($credentials)) {
                return redirect()->intended('user/dashboard');
            }else{
                $adduser = User::create([
                    "f_name" => $user->user['given_name'],
                    "l_name" => $user->user['family_name'],
                    "email" => $user->email,
                    "profile_image" => $user->user['picture'],
                    "username" => $user->email,
                    "password" => Hash::make($user->email . $user->user['family_name'])
                ]);
                if(Auth::guard('user')->attempt($credentials)){
                    return redirect()->intended('user/dashboard');
                }
            }
        }else{
            return redirect('/login')->withErrors([
                'error' => 'This Account has no permission to create or login.',
            ]);
        }
        

    }
}
