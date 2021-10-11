<?php

namespace App\Http\Controllers\Admin;

use Ahmedjoda\JodaResources\JodaResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    use JodaResource;
    protected $rules = [
        'name' => 'required',
        'mobile' => 'required',
        'email' => 'required|email',
        'password' => 'sometimes',
        'bank_id' => 'sometimes',
        'active' => 'sometimes',
    ];


    public function beforeStore()
    {
        request()->validate(['password' => 'required|min:6']);
        request()->merge(
            [
                'password' => Hash::make(request()->password)
            ]
        );
    }
    public function beforeUpdate()
    {
        if (request()->password)
            $this->beforeStore();
    }
}
