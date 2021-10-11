<?php

namespace App\Http\Controllers\Admin;

use Ahmedjoda\JodaResources\JodaResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BankController extends Controller
{
    use JodaResource;
    protected $rules = ['name' => 'required'];
}
