<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

//use App\Models\User;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'type'
    ];

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

    public function employer()
    {
        return $this->belongsTo('App\Models\Employer', 'id', 'user_id');
    }
    public function unemployed()
    {
        return $this->belongsTo('App\Models\Unemployed', 'id', 'user_id');
    }

    /**
     * @return bool
     */
    public function isEmployer()
    {
        return (bool)$this->employer;
    }

//    public function isAdmin(){
////        dd($this->user()::where('type', "admin"));
//
//        dd($this->Auth::user()::where('type', "admin"));
////        return $this->App\Models\User::user()::where('type', "admin")->get();
//    }

    /**
     * @return bool
     */

//    public function isUnemployed()
//    {
//        return (bool)$this->unemployed;
//    }

    public function isHasAllowance()
    {
        return (bool)$this->allowance;
    }

}
