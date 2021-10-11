<?php

namespace App\Http\Controllers;

use App\EstateRequest;
use App\FinanceRequest;
use App\Http\Controllers\Controller;
use App\ProgramingRequest;
use App\RequestStatus;
use App\Status;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{


    public function loginView()
    {
        return view('signup');
    }

    public function varifyView()
    {
        return view('varification');
    }

    public function forgetView()
    {
        return view('forget');
    }
    public function profileView()
    {

        $erequests = EstateRequest::where('users_id', Auth::id())->orderBy('id', 'desc')->with('estate')->get();
        $prequests = ProgramingRequest::where('users_id', Auth::id())->orderBy('id', 'desc')->get();
        $frequests = FinanceRequest::where('users_id', Auth::id())->orderBy('id', 'desc')->get();
        $user = Auth::user();

        foreach ($frequests as &$req) {
            $req->status = RequestStatus::join('statuses', 'request_status.statuses_id', 'statuses.id')
                ->where('request_status.frequests_id', $req->id)->orderBy('request_status.id', 'desc')->first();
        }
        return view('profile', ['erequests' => $erequests, 'frequests' => $frequests, 'prequests' => $prequests, 'user' => $user]);
    }

    public function signup(Request $request)
    {

        $validator = Validator::make($request->all(), User::getStoreRules());

        if ($validator->fails()) {
            Session::put('_errors', ['الرجاء التحقق من جميع البيانات المدخلة']);
            Session::save();

            return redirect()->back();
        } else {

            if ($request->password != $request->cpassword) {
                Session::put('_errors', ['كلمة المرور غير متطابقة']);
                Session::save();
                return redirect()->back();
            }

            $obj = new User();
            $obj->name = $request->name;
            $obj->email = $request->email;
            $obj->birthday = $request->birthday;
            $obj->password = bcrypt($request->password);
            $obj->code = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRST"), 0, 6);
            if (!$obj->save()) {
                Session::put('_errors', ['الايميل المدخل مستحدم مسبقا']);
                Session::save();
                return redirect()->back();
            }

            Auth::attempt(['email' => $request->email, 'password' => $request->password, 'type' => '0']);
            Session::put('successes', ['تم انشاء الحساب بنجاح']);
            Session::save();

            Mail::send('mail.code_tmp', ['code' => $obj->code], function ($message) use ($request) {
                $message->to($request->email, $request->name)->subject
                ('شركة حلول الاعمال المحدودة | رمز التاكيد');
                $message->from('info@bs-ltd.com.sa', 'شركة حلول الاعمال المحدودة ');
            });

            return redirect('/varify');
        }

    }


    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), User::getLoginRules());

        if ($validator->fails()) {
            Session::put('_errors', ["الرجاء التحقق من بريدك الاكتروني وكلمة المرور"]);
            Session::save();
            return redirect()->back();
        } else {

            $username = $request->email;
            $password = $request->password;


            if (Auth::attempt(['email' => $username, 'password' => $password, 'type' => '0'])) {
                return redirect('profile');
            } else {

                Session::put('_errors', ["الرجاء التحقق من بريدك الاكتروني وكلمة المرور"]);
                Session::save();
                return redirect('/signup');
            }


        }
    }

    function logout(Request $request)
    {
        Auth::logout();
        return redirect('/signup');
    }

    public function varify(Request $request)
    {

        $validator = Validator::make($request->all(), ['code' => 'required']);

        if ($validator->fails()) {
            Session::put('_errors', ["الرجاء التحقق من البيانات المدخلة"]);
            Session::save();
            return redirect()->back();
        } else {

            if ($request->code == Auth::user()->code) {
                $obj = User::find(Auth::id());
                $obj->email_verified_at = Carbon::now();
                $obj->update();
                Session::put('successes', ["تم تفعيل حسابك بنجاح"]);
                Session::save();
                return redirect('profile');
            } else {
                Session::put('_errors', ["رمز التحقق الذي قمت بادخاله خاطئ"]);
                Session::save();
                return redirect()->back();
            }


        }
    }


    public function forget(Request $request)
    {

        $validator = Validator::make($request->all(), ['email' => 'required|email']);

        if ($validator->fails()) {
            Session::put('_errors', ["الرجاء التحقق من البيانات المدخلة"]);
            Session::save();
            return redirect()->back();
        } else {
            $obj = User::where('email',$request->email)->first();
            if ($obj){
                $password =  substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRST"), 0, 8);
                $obj->password = bcrypt($password);
                $obj->update();
                Mail::send('mail.forget_tmp', ['code' => $password], function ($message) use ($request) {
                    $message->to($request->email, $request->name)->subject
                    ('شركة حلول الاعمال المحدودة |استعادة كلمة المرور');
                    $message->from('info@bs-ltd.com.sa', 'شركة حلول الاعمال المحدودة ');
                });

                Session::put('successes', ["قمنا بارسال رسالة التهيئة الى بريدك الالكتروني"]);
                Session::save();
                return redirect('signup');

            }else{
                Session::put('_errors', ["البريد الاكتروني الذي قمت بادخاله غير مرتبط بأي حساب"]);
                Session::save();
                return redirect()->back();
            }


        }
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), User::getUpdateRules());

        if ($validator->fails()) {
            Session::put('_errors', ['الرجاء التحقق من جميع البيانات المدخلة']);
            Session::save();

            return redirect()->back();
        } else {

            $obj = User::find(Auth::user()->id);
            $obj->name = $request->name;
            $obj->birthday = $request->birthday;
            if ($request->password != $request->cpassword) {
                Session::put('_errors', ['كلمة المرور غير متطابقة']);
                Session::save();
                return redirect()->back();
            }
            if ($request->password) {
                $obj->password = bcrypt($request->password);
            }
            $obj->update();
            Session::put('successes', ['تم التعديل بنجاح']);
            Session::save();
            return redirect()->back();
        }
    }


}
