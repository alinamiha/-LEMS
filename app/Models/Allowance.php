<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Allowance
 * @package App\Models
 *
 * @property int $unemployed_id
 */
class Allowance extends Model
{
    use HasFactory;

    protected $fillable = [
        'birthday',
        'citizenship',
        'registration_address',
        'factual_address',
        'education_degree',
        'name_education',
        'last_work_place',
        'status'
    ];


    public function unemployed()
    {

        return $this->belongsTo('App\Models\Unemployed');
    }

    public function passport()
    {

        return $this->belongsTo('App\Models\Passport');
    }

    public function payment()
    {
        return $this->hasMany('App\Models\Payment');
    }
}
