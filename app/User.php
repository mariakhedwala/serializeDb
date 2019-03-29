<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password',
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

    public static function detail($validated)
    {
        // return $validated;
        // return $validated->toJson();
        return json_encode($validated);
    }

    public static function display($request) 
    {
        $user = \App\User::all();

        // return $user->toArray();
        $fn = $user->toArray();
        return $fn;
        $fnc = $fn[0];
        $final = $fnc['first_name'];
        return explode(",", $final);
    }
}
