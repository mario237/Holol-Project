<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Estate;
use App\EstateRequest;
use App\FinanceRequest;
use App\Http\Controllers\Controller;
use App\JobRequest;
use App\ProgramingRequest;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $statistics = array(
            'users'=>User::where('type','!=','4')->count(),
            'programming_request'=>ProgramingRequest::count(),
            'estate_requests'=>EstateRequest::count(),
            'financial_request'=>FinanceRequest::count(),
            'cities'=>City::count(),
            'estates'=>Estate::count(),
            );
        return view('admin.dashboard',['statistic'=>$statistics]);
    }
}
