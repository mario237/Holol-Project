<?php

namespace App\Http\Controllers;

use App\City;
use App\Estate;
use App\EstateRequest;
use App\Extra;
use App\FinanceRequest;
use App\Http\Controllers\Controller;
use App\Job;
use App\JobRequest;
use App\Status;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{


    public function loadJobs()
    {
        $jobs = Job::all();
        return view('jobs', ['jobs' => $jobs]);
    }



    public function loadJobDetail(Request $request)
    {
        $job = Job::find($request->id);
        return view('job-detail', ['job' => $job]);

    }


    public function sendJobRequest(Request $request)
    {
        $validator = Validator::make($request->all(), ['fname' => 'required', 'lname' => 'required', 'email' => 'required|email', 'file' => 'required']);

        if ($validator->fails()) {
            Session::put('_errors', ['الرجاء التحقق من جميع البيانات المدخلة']);
            Session::save();
            return redirect()->back();
        } else {

            $obj = new JobRequest();
            $obj->code = substr(str_shuffle("0123456789"), 0, 4);
            $obj->fullname = $request->fname . ' ' . $request->lname;
            $obj->email = $request->email;
            $obj->jobs_id = $request->jobs_id;
            $obj->ref_code = ($request->ref_code)?$request->ref_code:'';
            $obj->users_id = Auth::id();

            $imageName = time() . '.' . $request->file->getClientOriginalExtension();
            $request->file->move(storage_path('app/public/jobs'), $imageName);
            $obj->cv_file = 'storage/jobs/' . $imageName;

            $obj->save();

            Session::put('successes', ['تم ارسال الطلب بنجاح']);
            Session::save();
            return redirect()->back();
        }

    }

    public function sendMissedFile(Request $request)
    {
        $validator = Validator::make($request->all(), ['file' => 'required']);

        if ($validator->fails()) {
            Session::put('_errors', ['الرجاء التحقق من جميع البيانات المدخلة']);
            Session::save();
            return redirect()->back();
        } else {

            $obj = new Extra();

            $imageName = time() . '.' . $request->file->getClientOriginalExtension();
            $request->file->move(storage_path('app/public/missed'), $imageName);
            $obj->file = 'storage/missed/' . $imageName;
            $obj->statuses_id = $request->statuses_id;
            $obj->frequests_id = $request->frequests_id;
            $obj->users_id = Auth::id();
            $obj->save();

            Session::put('successes', ['تم ارسال الطلب بنجاح']);
            Session::save();
            return redirect()->back();
        }

    }



    public function sendFinanceRequest(Request $request)
    {


        $rules = [
            'fullname' => 'required',
            'phone' => 'required',
            'support' => 'required',
            'job' => 'required',
            'identity_img' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'salary_file' => 'required',
            'simah_file' => 'required',
            'finance_type' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            Session::put('_errors', ['الرجاء التحقق من جميع البيانات المدخلة']);
            Session::save();
            return redirect()->back();
        } else {

            $obj = new FinanceRequest();
            $obj->fullname = $request->fullname;
            $obj->phone = $request->phone;
            $obj->support = $request->support;
            $obj->job = $request->job;
            $obj->job_type = ($request->job_type) ? $request->job_type : '';
            $obj->finance_type = $request->finance_type;

            $imageName = time() . '_1.' . $request->identity_img->getClientOriginalExtension();
            $request->identity_img->move(storage_path('app/public/requests'), $imageName);
            $obj->identity_img = 'storage/requests/' . $imageName;

            $imageName = time() . '_2.' . $request->salary_file->getClientOriginalExtension();
            $request->salary_file->move(storage_path('app/public/requests'), $imageName);
            $obj->salary_file = 'storage/requests/' . $imageName;

            $imageName = time() . '_3.' . $request->simah_file->getClientOriginalExtension();
            $request->simah_file->move(storage_path('app/public/requests'), $imageName);
            $obj->simah_file = 'storage/requests/' . $imageName;

            if ($request->other_file) {
                $imageName = time() . '_4.' . $request->other_file->getClientOriginalExtension();
                $request->other_file->move(storage_path('app/public/requests'), $imageName);
                $obj->other_file = 'storage/requests/' . $imageName;
            }

            $obj->users_id = Auth::id();
            $obj->save();

            Session::put('successes', ['تم ارسال الطلب بنجاح']);
            Session::save();
            return redirect()->back();
        }

    }


}
