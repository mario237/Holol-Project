<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

/**
 * @method static count()
 */
class ProgramingRequest  extends Model
{

    protected $table = 'prequests';

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
