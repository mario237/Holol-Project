<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class City  extends Model
{
    public $timestamps = false;
    protected $table = 'cities';

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
