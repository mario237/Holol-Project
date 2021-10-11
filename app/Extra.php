<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Extra  extends Model
{

    protected $table = 'extras';

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

    function  user(){
        return $this->hasOne('App\User','id','users_id');
    }


}
