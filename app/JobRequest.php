<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class JobRequest  extends Model
{

    protected $table = 'jrequests';

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


    function job(){
        return $this->hasOne('App\Job','id','jobs_id');
    }


}
