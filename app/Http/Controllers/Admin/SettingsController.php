<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function store()
    {
        $data = request()->only([
            'site_name',
            'stop_site',
            'site_logo',
            'site_icon',
            'stop_site_message',
        ]);

        if (request()->hasFile('site_logo'))
            $data['site_logo'] =  upload('site_logo', 'settings');

        if (request()->hasFile('site_icon'))
            $data['site_icon'] =  upload('site_icon', 'settings');


        setting($data)->save();
        return back()->with('success', 'تم الحفظ بنجاح');
    }
}
