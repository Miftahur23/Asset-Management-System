<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class EmployeeInfo extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'facebook_id',
        'reset_token',
        'reset_token_expire_at',
        'role',
    ];

    public function branches()
    {
        return $this-> belongsTo(Branch::class);
    }

    public function departments()
    {
        return $this-> belongsTo(Department::class);
    }

    public function users()
    {
        return $this-> belongsTo(User::class,'user_id','id');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function usertype(){

    //     return $this->belongsTo(User::class);

    // }
}
