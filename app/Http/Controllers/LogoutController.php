<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function index(){
        if(auth('user')->check()){
            auth('user')->logout();
        }else{
            auth('admin')->logout();
        }
        return redirect('/');
    }
}
