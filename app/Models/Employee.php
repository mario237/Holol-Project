<?php

namespace App\Models;

use App\Client;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static find($users_id)
 * @method static count()
 */
class Employee extends Model
{
    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    public function clients()
    {
        return $this->hasMany(Client::class, 'users_id', 'id');
    }
}
