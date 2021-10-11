<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Job  extends Model
{

    protected $table = 'jobs';

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
