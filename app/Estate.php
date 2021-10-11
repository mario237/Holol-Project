<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Estate  extends Model
{

    public $timestamps = false;
    protected $table = 'estates';

    protected $hidden = [
        'created_at', 'updated_at'
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


    function  images(){
        return $this->hasMany('App\Image','estates_id','id');
    }
    function  city(){
        return $this->hasOne('App\City','id','cities_id');
    }



}
