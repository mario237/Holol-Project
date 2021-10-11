<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Status  extends Model
{

    protected $table = 'statuses';

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


//    function  extras(){
//        return $this->hasMany('App\Extra','statuses_id','id');
//    }



}
