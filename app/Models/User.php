<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'firstname',
    //     'lastname',
    //     'email',
    //     'phone_number',
    //     'password',
    //     'worker'
    // ];
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function departments()
    {
        return $this->belongsToMany(Department::class);
    }

    // public function setPostImageAttribute($value)
    // {
    //     $this->attributes['post_image'] = asset($value);
    // }

    public function getUserImageAttribute($value)
    {
        if (strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) { //this is for images gotten online
            return $value;
        }
        return asset('storage/' . $value); //this is for images in the local path or directory
        // return  asset($value);
    }

}
