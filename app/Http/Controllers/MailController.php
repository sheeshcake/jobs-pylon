<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApproveMail;

class MailController extends Controller
{
    public function approveemail(){
        Mail::to("spooderm5@gmail.com")->send(new ApproveMail());
    }
}
