<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class ClientFile  extends Model
{
    protected $table = 'client_files';

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
