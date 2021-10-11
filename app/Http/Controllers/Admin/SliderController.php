<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Job;
use App\Slider;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Slider::all();
        return view('admin.sliders', ['items' => $list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $obj = new Slider();
        $helper = array(
            'method' => 'POST',
            'action' => url('dashboard/sliders'),
            'title' => 'انشاء'
        );
        return view('admin.manage.add-edit-slider', ['item' => $obj, 'helper' => $helper]);
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
            'image' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('dashboard/sliders/create')
                ->withErrors($validator)
                ->withInput();
        } else {


            $obj = new Slider();

            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(storage_path('app/public/images'), $imageName);
            $obj->image = 'storage/images/' . $imageName;

            $obj->save();
            Session::put('successes', ['تمت الاضافة بنجاح']);
            Session::save();
            return redirect('dashboard/sliders');
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
            return redirect('dashboard/sliders')
                ->withErrors($validator);
        } else {
            $obj = Slider::find($id);
            $helper = array(
                'method' => 'PUT',
                'action' => url('dashboard/sliders/' . $id),
                'title' => 'نعديل'
            );
            return view('admin.manage.add-edit-slider', ['item' => $obj, 'helper' => $helper]);
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
            'image' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect("dashboard/sliders/$id/edit")
                ->withErrors($validator)
                ->withInput();
        } else {

            $obj = Slider::find($id);

            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(storage_path('app/public/sliders'), $imageName);
            $obj->image = 'storage/sliders/' . $imageName;

            $obj->update();
            Session::put('successes', ['تم التعديل بنجاح']);
            Session::save();
            return redirect('dashboard/sliders');
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
        $obj = Slider::find($id);
        $obj->delete();
        Session::put('successes', ['تم الحذف بنجاح']);
        Session::save();
        return redirect('dashboard/sliders');
    }


}
