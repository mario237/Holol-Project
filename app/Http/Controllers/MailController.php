<?php

namespace App\Http\Controllers;
use App\Contect;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Mail;

use App\Http\Requests;

class MailController extends Controller {

    public function send_email(Request $request) {

        $data = array('name'=>$request->fname.' '.$request->lname,'email'=>$request->email,
            'messages'=>$request->message);



        Mail::send('mail.mail_tmp', $data, function($message) use ($request) {
            $emails = array("info@bs-ltd.com.sa");
            $message->to($emails, 'شركة حلول الاعمال المحدودة ')->subject
            ('شركة حلول الاعمال المحدودة | اتصل بنا');
            $message->from($request->email,$request->name );
        });


        Session::put('successes', ['تم  ارسال الطلب بنجاح']);
        Session::save();
        return redirect()->back();
    }





}