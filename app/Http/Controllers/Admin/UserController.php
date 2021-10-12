<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bank;
use App\Http\Controllers\Controller;
use App\Managements;
use App\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $type = '-1';
        if ($request->type && $request->type != '-1') {
            $type = $request->type;
            if ($type == '1') {
                $users = User::where([['type', '!=', '4'], ['type', '=', '0']])->with('management')->get();
            } else {
                $users = User::where('type', '!=', '4')->whereIn('type', ['1', '2', '3'])->with('management')->get();
            }
        } else {
            $users = User::where('type', '!=', '4')->with('management')->get();
        }
        return view('admin.user.index', ['users' => $users, 'type' => $type]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $obj = new User();
        $helper = array(
            'method' => 'POST',
            'action' => url('dashboard/users'),
            'title' => 'انشاء'
        );
        $managements = Managements::all();
        $banks = Bank::all();
        return view('admin.user.add-edit-user', ['item' => $obj, 'helper' => $helper, 'managements' => $managements, 'banks' => $banks]);
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
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if ($validator->fails()) {
            return redirect('dashboard/users/create')
                ->withErrors($validator)
                ->withInput();
        } else {

            if ($request->password != $request->cpassword) {
                Session::put('successes', ['كلمة المرور غير متطابقة']);
                Session::save();
                return redirect()->back();
            }

            $obj = new User();
            $obj->name = $request->name;
            $obj->type = $request->type;
            $obj->email = $request->email;
            $obj->birthday = $request->birthday;
            $obj->job_title = ($request->job_title) ? $request->job_title : '';
            $obj->job_id = ($request->job_id) ? $request->job_id : '';
            $obj->managements_id = $request->managements_id;
            $obj->password = bcrypt($request->password);
            $obj->type = $request->type;
            $obj->serial_no = ($request->serial_no) ? $request->serial_no : '';
            $obj->save();
            Session::put('successes', ['تمت الاضافة بنجاح']);
            Session::save();
            return redirect('dashboard/users');
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
        $user = User::Find($id);
        return view('admin.user.show', compact('user'));
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
            return redirect('dashboard/users')
                ->withErrors($validator);
        } else {
            $obj = User::find($id);
            $helper = array(
                'method' => 'PUT',
                'action' => url('dashboard/users/' . $id),
                'title' => 'تعديل'
            );
            $managements = Managements::all();
            $banks = Bank::all();
            return view('admin.user.add-edit-user', ['item' => $obj, 'helper' => $helper, 'managements' => $managements, 'banks' => $banks]);
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
            'type' => 'required',
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return redirect("dashboard/users/$id/edit")
                ->withErrors($validator)
                ->withInput();
        } else {

            $obj = User::find($id);
            $obj->name = $request->name;
            $obj->email = $request->email;
            $obj->type = $request->type;
            $obj->birthday = $request->birthday;
            $obj->job_title = ($request->job_title) ? $request->job_title : '';
            $obj->job_id = ($request->job_id) ? $request->job_id : '';
            $obj->managements_id = $request->managements_id;
            $obj->serial_no = ($request->serial_no) ? $request->serial_no : '';
            if ($request->password) {
                if ($request->password != $request->cpassword) {
                    Session::put('successes', ['كلمة المرور غير متطابقة']);
                    Session::save();
                    return redirect()->back();
                }
                $obj->password = bcrypt($request->password);
            }
            $obj->update();
            Session::put('successes', ['تم التعديل بنجاح']);
            Session::save();
            return redirect('dashboard/users');
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
        $obj = User::find($id);
        $obj->delete();
        Session::put('successes', ['تم الحذف بنجاح']);
        Session::save();
        return redirect('dashboard/users');
    }


    public function loginView()
    {

        return view('admin.login');
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


            if (Auth::attempt(['email' => $username, 'password' => $password])) {
                return redirect('dashboard');
            } else {

                Session::put('_errors', ["اسم المستخدم او كلمة المرور خاطئ"]);
                Session::save();
                return redirect('dashboard/login');
            }
        }
    }

    function logout(Request $request)
    {
        Auth::logout();
        return redirect('dashboard/login');
    }


    public function updateSetting(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'nullable|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        } else {

            $obj = User::find(Auth::user()->id);
            $obj->name = $request->name;
            $obj->email = $request->email;
            if ($request->password != $request->cpassword) {
                Session::put('_errors', ['كلمة المرور غير متطابقة']);
                Session::save();
                return redirect('dashboard/setting');
            }
            if ($request->password) {
                $obj->password = bcrypt($request->password);
            }
            $obj->update();
            Session::put('successes', ['تم التعديل بنجاح']);
            Session::save();
            return redirect('dashboard/setting');
        }
    }

    public function setting()
    {

        $user = Auth::user();

        return view('admin.setting', ['user' => $user]);
    }
    public function settings()
    {

        return view('admin.settings');
    }

}
