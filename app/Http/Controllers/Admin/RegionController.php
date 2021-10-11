<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = City::all();
        return view('admin.regions', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $obj = new City();
        $helper = array(
            'method' => 'POST',
            'action' => url('dashboard/regions'),
            'title' => 'انشاء'
        );
        return view('admin.manage.add-edit-region', ['item' => $obj, 'helper' => $helper]);
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
            'name' => 'required',
            'image' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('dashboard/regions/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $obj = new City();
            $obj->name = $request->name;

            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(storage_path('app/public/city'), $imageName);
            $obj->image = 'storage/city/' . $imageName;

            $obj->save();
            Session::put('successes', ['تمت الاضافة بنجاح']);
            Session::save();
            return redirect('dashboard/regions');
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
            return redirect('dashboard/regions')
                ->withErrors($validator);
        } else {
            $obj = City::find($id);
            $helper = array(
                'method' => 'PUT',
                'action' => url('dashboard/regions/' . $id),
                'title' => 'تعديل'
            );
            return view('admin.manage.add-edit-region', ['item' => $obj, 'helper' => $helper]);
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
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect("dashboard/regions/$id/edit")
                ->withErrors($validator)
                ->withInput();
        } else {

            $obj = City::find($id);
            $obj->name = $request->name;
            if ($request->image) {
                $imageName = time() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(storage_path('app/public/city'), $imageName);
                $obj->image = 'storage/city/' . $imageName;
            }
            $obj->update();
            Session::put('successes', ['تم التعديل بنجاح']);
            Session::save();
            return redirect('dashboard/regions');
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
        $obj = City::find($id);
        $obj->delete();
        Session::put('successes', ['تم الحذف بنجاح']);
        Session::save();
        return redirect('dashboard/regions');
    }


}
