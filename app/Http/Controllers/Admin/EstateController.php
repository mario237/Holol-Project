<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Estate;
use App\Http\Controllers\Controller;
use App\Job;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class EstateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Estate::with('city')->join('users','users_id','users.id')
            ->select('estates.*','users.name as user_name')->get();
        return view('admin.estates', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $obj = new Estate();
        $helper = array(
            'method' => 'POST',
            'action' => url('dashboard/estates'),
            'title' => 'انشاء'
        );
        $cities = City::all();
        return view('admin.manage.add-edit-estate', ['item' => $obj, 'helper' => $helper,'cities'=>$cities]);
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
            'address' => 'required',
            'image' => 'required',
            'price' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('dashboard/estates/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $obj = new Estate();
            $obj->title = $request->title;
            $obj->address = $request->address;
            $obj->price = $request->price;
            $obj->description = $request->description;
            $obj->map = $request->map;
            $obj->add_type = $request->add_type;
            $obj->room_num = $request->room_num;
            $obj->hole_num = $request->hole_num;
            $obj->bath_num = $request->bath_num;
            $obj->kitchen_num = $request->kitchen_num;
            $obj->enterance_num = $request->enterance_num;
            $obj->area = $request->area;
            $obj->ground_area = $request->ground_area   ;
            $obj->street_area = $request->street_area   ;
            $obj->street_area2 = ($request->street_area2)?$request->street_area2:''   ;
            $obj->driver_room = $request->driver_room   ;
            $obj->maid_room = $request->maid_room   ;
            $obj->watertank_num = $request->watertank_num   ;
            $obj->cities_id = $request->cities_id   ;
            $obj->users_id = Auth::id()   ;

            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(storage_path('app/public/estate'), $imageName);
            $obj->image = 'storage/estate/' . $imageName;

            $obj->save();
            Session::put('successes', ['تمت الاضافة بنجاح']);
            Session::save();
            return redirect('dashboard/estates');
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
        $obj = Estate::where('id',$id)->with('images')->first();
        return view('admin.manage.detail-estate', ['estate' => $obj]);
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
            return redirect('dashboard/estates')
                ->withErrors($validator);
        } else {
            $obj = Estate::find($id);
            $helper = array(
                'method' => 'PUT',
                'action' => url('dashboard/estates/' . $id),
                'title' => 'تعديل'
            );
            $cities = City::all();
            return view('admin.manage.add-edit-estate', ['item' => $obj, 'helper' => $helper,'cities'=>$cities]);
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
            'address' => 'required',
            'price' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect("dashboard/estates/$id/edit")
                ->withErrors($validator)
                ->withInput();
        } else {

            $obj = Estate::find($id);
            $obj->title = $request->title;
            $obj->address = $request->address;
            $obj->price = $request->price;
            $obj->description = $request->description;
            $obj->map = $request->map;
            $obj->add_type = $request->add_type;
            $obj->room_num = $request->room_num;
            $obj->hole_num = $request->hole_num;
            $obj->bath_num = $request->bath_num;
            $obj->kitchen_num = $request->kitchen_num;
            $obj->enterance_num = $request->enterance_num;
            $obj->area = $request->area;
            $obj->ground_area = $request->ground_area   ;
            $obj->street_area = $request->street_area   ;
            $obj->street_area2 = ($request->street_area2)?$request->street_area2:''   ;
            $obj->driver_room = $request->driver_room   ;
            $obj->maid_room = $request->maid_room   ;
            $obj->watertank_num = $request->watertank_num   ;
            $obj->cities_id = $request->cities_id   ;
            if ($request->image) {
                $imageName = time() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(storage_path('app/public/estate'), $imageName);
                $obj->image = 'storage/estate/' . $imageName;
            }
            $obj->update();
            Session::put('successes', ['تم التعديل بنجاح']);
            Session::save();
            return redirect('dashboard/estates');
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
        $obj = Estate::find($id);
        $obj->delete();
        Session::put('successes', ['تم الحذف بنجاح']);
        Session::save();
        return redirect('dashboard/estates');
    }


}
