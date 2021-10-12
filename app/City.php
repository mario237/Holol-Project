<?php

namespace App;


use App\Models\Consult;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static count()
 */
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


    public function consult(): HasMany
    {
        return $this->hasMany(Consult::class);
    }


}
