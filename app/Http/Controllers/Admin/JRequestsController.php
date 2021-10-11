<?php

namespace App\Http\Controllers\Admin;

use App\EstateRequest;
use App\Http\Controllers\Controller;
use App\JobRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class JRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = JobRequest::with('job')->leftJoin('users','users.id','seen')
            ->select('jrequests.*','users.name as seen_name')->get();
        return view('admin.job-orders', ['list' => $list]);
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


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


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
            $obj = JobRequest::find($id);
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
        $obj = JobRequest::find($id);
        $obj->delete();
        Session::put('successes', ['تم الحذف بنجاح']);
        Session::save();
        return redirect()->back();
    }





}
