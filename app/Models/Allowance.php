<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allowance extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'birthday',
        'citizenship',
        'passport_id',
        'registration_address',
        'factual_address',
        'education_degree',
        'name_education',
        'last_work_place',
        'email',
        'phone',
        'status'
    ];

    public function user(){

        return $this->belongsTo('App\Models\User', 'foreign_key');
    }

    public function passport(){

        return $this->belongsTo('App\Models\Passport', 'foreign_key');
    }
}
