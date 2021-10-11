<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Managements  extends Model
{
    public $timestamps = false;
    protected $table = 'managments';

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
