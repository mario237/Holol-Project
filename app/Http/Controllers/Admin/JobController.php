<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Http\Controllers\Controller;
use App\Job;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Job::all();
        return view('admin.jobs', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $obj = new Job();
        $helper = array(
            'method' => 'POST',
            'action' => url('dashboard/jobs'),
            'title' => 'انشاء'
        );
        return view('admin.manage.add-edit-job', ['item' => $obj, 'helper' => $helper]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'short_desc' => 'required',
            'image' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('dashboard/jobs/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $obj = new Job();
            $obj->title = $request->title;
            $obj->description = $request->description;
            $obj->short_desc = $request->short_desc;

            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(storage_path('app/public/jobs'), $imageName);
            $obj->image = 'storage/jobs/' . $imageName;

            $obj->save();
            Session::put('successes', ['تمت الاضافة بنجاح']);
            Session::save();
            return redirect('dashboard/jobs');
        }

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

        $validator = Validator::make(['id' => $id], ['id' => 'required|numeric']);

        if ($validator->fails()) {
            return redirect('dashboard/jobs')
                ->withErrors($validator);
        } else {
            $obj = Job::find($id);
            $helper = array(
                'method' => 'PUT',
                'action' => url('dashboard/jobs/' . $id),
                'title' => 'تعديل'
            );
            return view('admin.manage.add-edit-job', ['item' => $obj, 'helper' => $helper]);
        }
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
            'title' => 'required',
            'description' => 'required',
            'short_desc' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect("dashboard/jobs/$id/edit")
                ->withErrors($validator)
                ->withInput();
        } else {

            $obj = Job::find($id);
            $obj->title = $request->title;
            $obj->description = $request->description;
            $obj->short_desc = $request->short_desc;
            if ($request->image) {
                $imageName = time() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(storage_path('app/public/jobs'), $imageName);
                $obj->image = 'storage/jobs/' . $imageName;
            }
            $obj->update();
            Session::put('successes', ['تم التعديل بنجاح']);
            Session::save();
            return redirect('dashboard/jobs');
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
        $obj = Job::find($id);
        $obj->delete();
        Session::put('successes', ['تم الحذف بنجاح']);
        Session::save();
        return redirect('dashboard/jobs');
    }


}
