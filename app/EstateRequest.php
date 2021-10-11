<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class EstateRequest  extends Model
{

    protected $table = 'erequests';

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


    function  estate(){
        return $this->hasOne('App\Estate','id','estates_id');
    }

}
