<?php

namespace App\Http\Controllers\Admin;

use App\EstateRequest;
use App\Extra;
use App\FinanceRequest;
use App\Http\Controllers\Controller;
use App\RequestStatus;
use App\Status;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class FRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = FinanceRequest::leftJoin('users','users.id','seen')
            ->select('frequests.*','users.name as seen_name')->get();
        return view('admin.financial-orders', ['list' => $list]);
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $validator = Validator::make(['id' => $id], ['id' => 'required|numeric']);

        if ($validator->fails()) {
            return redirect('dashboard/orders/financial')
                ->withErrors($validator);
        } else {
            $order = FinanceRequest::where('id', $id)->first();
            $statuses = Status::all();

            $order->status = Status::join('request_status as rs', 'rs.statuses_id', 'statuses.id')
                ->where('rs.frequests_id', $order->id)->orderBy('id', 'desc')->select('statuses.*', 'rs.action')->first();

            if ($order->status) {
                $order->status->extras = Extra::where([
                    ['frequests_id', $id],
                    ['statuses_id', $order->status->id],

                ])->with('user')->get();
            }

            return view('admin.manage.detail-financial', ['order' => $order, 'statuses' => $statuses]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'seen' => 'required',
        ]);

        if ($validator->fails()) {
            Session::put('successes', ['جميع البيانات مطلوبة']);
            Session::save();
            return redirect()->back();
        } else {
            $obj = FinanceRequest::find($id);
            $obj->seen = Auth::id();
            $obj->update();
            Session::put('successes', ['تم التعديل بنجاح']);
            Session::save();
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $obj = FinanceRequest::find($id);
        $obj->delete();
        Session::put('successes', ['تم الحذف بنجاح']);
        Session::save();
        return redirect()->back();
    }


    public function sendReport(Request $request)
    {
//        return $request->all();
        $validator = Validator::make($request->all(), ['text' => 'nullable', 'status' => 'required']);

        if ($validator->fails()) {
            Session::put('_errors', ['الرجاء التحقق من جميع البيانات المدخلة']);
            Session::save();
            return redirect()->back();
        } else {

            $current = RequestStatus::where([
                ['statuses_id', $request->statuses_id],
                ['frequests_id', $request->frequests_id],
            ])->first();


            if ($request->status == '-1') {
                $current->action = $request->status;
                $current->update();

                $obj = new Extra();
                $obj->text = $request->text;
                $obj->statuses_id = $request->statuses_id;
                $obj->frequests_id = $request->frequests_id;
                $obj->users_id = Auth::id();
                $obj->provided_by = '1';
                $obj->save();
                Session::put('successes', ['تم ارسال التقرير بنجاح']);
            } else {
                if ($request->statuses_id == 3) {
                    $current->action = '0';
                    $current->update();

                    $obj = new Extra();
                    $txt = "-التمويل الشخصي : " . $request->personal_finance;
                    $txt .= "<br/>";
                    $txt .= "-القسط الشخصي : " . $request->personal_installment;
                    $txt .= "<br/>";
                    $txt .= "-التمويل العقاري : " . $request->mortgage;
                    $txt .= "<br/>";
                    $txt .= "-القسط  العقاري : " . $request->estate_installment;
                    $txt .= "<br/>";
                    $txt .= "-القسط  الشامل : " . $request->total_installment;
                    $txt .= "<br/>";
                    $txt .= "-اجمالي التمويل : " . $request->total_finance;
                    $obj->text = $txt;
                    $obj->statuses_id = $request->statuses_id;
                    $obj->frequests_id = $request->frequests_id;
                    $obj->users_id = Auth::id();
                    $obj->provided_by = '1';
                    $obj->save();

                } else {
                    $current->action = $request->status;
                    $current->update();
                    if ($request->statuses_id < 4) {
                        $obj = new RequestStatus();
                        $obj->action = 0;
                        $obj->statuses_id = intval($request->statuses_id) + 1;
                        $obj->frequests_id = $request->frequests_id;
                        $obj->save();
                    }
                }
                Session::put('successes', ['تم نعديل الجالة بنجاح']);
            }


            Session::save();
            return redirect()->back();
        }

    }


}
