<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class RequestStatus  extends Model
{

    protected $table = 'request_status';

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
