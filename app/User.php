<?php

namespace App;

use App\Models\Bank;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @method static find(mixed $user_id)
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    static function getStoreRules()
    {
        return [
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'birthday' => 'required|date'
        ];
    }

    static function getUpdateRules()
    {
        return [
            'email' => 'required|email',
            'birthday' => 'required|date'
        ];
    }

    static function getLoginRules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required',
        ];
    }

    function management()
    {
        return $this->belongsTo('App\Managements', 'managements_id', 'id');
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
    public function clients()
    {
        return $this->hasMany(Client::class);
    }
}
