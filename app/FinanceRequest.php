<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class FinanceRequest  extends Model
{

    protected $table = 'frequests';

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
