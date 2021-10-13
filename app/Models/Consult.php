<?php

namespace App\Models;

use App\City;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static create(array $array)
 * @method static find($id)
 * @method static findOrFail($id)
 * @method static whereId($id)
 */
class Consult extends Model
{

    protected $table = 'consults';

    protected $primaryKey = 'id';

    protected $fillable = [
        'Name',
        'mobile',
        'city_id',
        'investment',
        'transaction'
    ];


    public $timestamps = false;

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

}
