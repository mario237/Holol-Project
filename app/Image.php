<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Image  extends Model
{
    public $timestamps = false;
    protected $table = 'images';

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
