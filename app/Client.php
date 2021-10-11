<?php

namespace App;

use App\Models\Bank;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static whereId($id)
 * @method static find($id)
 * @method static count()
 */
class Client  extends Model
{
    protected $table = 'clients';

    protected $hidden = [];
    protected $casts = [];
    protected $guarded = [];


    public static function getRules()
    {
        $rule = [];

        return $rule;
    }



    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
}
