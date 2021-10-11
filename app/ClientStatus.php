<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

/**
 * @method static find($status)
 */
class ClientStatus  extends Model
{

    protected $table = 'client_status';

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
