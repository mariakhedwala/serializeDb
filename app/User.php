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
        return json_encode($validated, JSON_UNESCAPED_SLASHES);
    }

    public static function display($user)
    {
        $user_data = $user->first_name;
        $someArray = json_decode($user_data, true);
        return $someArray;
    }

    public static function displayAll($users)
    {
        $all_data = [];
        foreach ($users as $user) {
            $user_data = $user->first_name;
            $someArray = json_decode($user_data, true);
            array_push($all_data, $someArray);
        }
        return $all_data;
    }
}
