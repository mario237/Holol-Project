<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Slider  extends Model
{
    protected $table = 'sliders';

    protected $hidden = [
    ];
    protected $casts = [

    ];
    protected $guarded = [];


    public static function getRules()
    {
        $rule = [
        ];

        return $rule;
    }




}
