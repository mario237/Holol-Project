<?php

namespace App\Http\Controllers;

use App\City;
use App\Estate;
use App\EstateRequest;
use App\Extra;
use App\FinanceRequest;
use App\Http\Controllers\Controller;
use App\ProgramingRequest;
use App\RequestStatus;
use App\Status;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class EstateController extends Controller
{


    public function loadCities()
    {
        $cities = City::all();
        return view('estates', ['cities' => $cities]);
    }

    public function loadEstates(Request $request)
    {
        $city = City::find($request->id);
        $estates = Estate::where('cities_id', $request->id)->get();
        return view('estates-list', ['estates' => $estates, 'city' => $city]);

    }

    public function loadEstateDetail(Request $request)
    {
        $estate = Estate::where('id', $request->id)->with('images')->first();
        return view('estate-detail', ['estate' => $estate]);

    }

    public function loadOrderDetail(Request $request)
    {
        $order = FinanceRequest::where('id', $request->id)->first();
        $statuses = Status::all();

        $order->status = Status::join('request_status as rs', 'rs.statuses_id', 'statuses.id')
            ->where('rs.frequests_id', $order->id)->orderBy('id','desc')->select('statuses.*', 'rs.action')->first();

        if ($order->status) {
            $order->status->extras = Extra::where([
                ['frequests_id', $request->id],
                ['statuses_id', $order->status->id],

            ])->get();
        }

        return view('order-detail', ['order' => $order, 'statuses' => $statuses]);

    }

    public function sendEstateRequest(Request $request)
    {
        $validator = Validator::make($request->all(), ['fname' => 'required', 'lname' => 'required', 'phone' => 'required']);

        if ($validator->fails()) {
            Session::put('_errors', ['الرجاء التحقق من جميع البيانات المدخلة']);
            Session::save();
            return redirect()->back();
        } else {

            $obj = new EstateRequest();
            $obj->code = substr(str_shuffle("0123456789"), 0, 4);
            $obj->fullname = $request->fname . ' ' . $request->lname;
            $obj->phone = $request->phone;
            $obj->estates_id = $request->id;
            $obj->ref_code = ($request->ref_code)?$request->ref_code:'';
            $obj->users_id = Auth::id();
            $obj->save();

            Session::put('successes', ['تم ارسال الطلب بنجاح']);
            Session::save();
            return redirect()->back();
        }

    }
    public function sendProgrammingRequest(Request $request)
    {
        $validator = Validator::make($request->all(), ['fname' => 'required', 'lname' => 'required', 'phone' => 'required']);

        if ($validator->fails()) {
            Session::put('_errors', ['الرجاء التحقق من جميع البيانات المدخلة']);
            Session::save();
            return redirect()->back();
        } else {

            $obj = new ProgramingRequest();
            $obj->fullname = $request->fname . ' ' . $request->lname;
            $obj->phone = $request->phone;
            $obj->ref_code = ($request->ref_code)?$request->ref_code:'';
            $obj->users_id = Auth::id();
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
            $obj->code = substr(str_shuffle("0123456789"), 0, 4);

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
    public function sendUserDecision(Request $request)
    {
        $validator = Validator::make($request->all(), ['status' => 'required']);

        if ($validator->fails()) {
            Session::put('_errors', ['الرجاء التحقق من جميع البيانات المدخلة']);
            Session::save();
            return redirect()->back();
        } else {


            $current = RequestStatus::where([
                ['statuses_id', $request->statuses_id],
                ['frequests_id', $request->frequests_id],
            ])->first();
            $current->action = $request->status;
            $current->update();

            if ($request->status == '-1'){
                $txt = "غير موافق بسبب : ";
                $txt .= "<br/>";
                $txt .= $request->text;

                $obj = new Extra();
                $obj->text = $txt;
                $obj->statuses_id = $request->statuses_id;
                $obj->frequests_id = $request->frequests_id;
                $obj->users_id = Auth::id();
                $obj->provided_by = '0';
                $obj->save();
            }else{
                $obj = new RequestStatus();
                $obj->action = 0;
                $obj->statuses_id = 4;
                $obj->frequests_id = $request->frequests_id;
                $obj->save();
            }

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
            $obj->code = substr(str_shuffle("0123456789"), 0, 4);
            $obj->fullname = $request->fullname;
            $obj->phone = $request->phone;
            $obj->support = $request->support;
            $obj->job = $request->job;
            $obj->ref_code = ($request->ref_code)?$request->ref_code:'';
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

            $action = new RequestStatus();
            $action->statuses_id = '1';
            $action->frequests_id = $obj->id;
            $action->action = '0';
            $action->save();


            Session::put('successes', ['تم ارسال الطلب بنجاح']);
            Session::save();
            return redirect()->back();
        }

    }


}
