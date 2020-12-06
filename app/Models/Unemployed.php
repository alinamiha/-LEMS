<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unemployed extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function allowance()
    {
        return $this->hasMany('App\Models\Allowance');
    }

    public function cv()
    {
        return $this->hasMany('App\Models\CurriculumVitae');
    }

    public function invoice()
    {
        return $this->belongsTo('App\Models\Invoice');
    }

    public function jobOffer()
    {
        return $this->hasMany('App\Models\JobOffer');
    }

    public function payment()
    {
        return $this->hasMany('App\Models\Payment');
    }
    public function work()
    {
        return $this->hasMany('App\Models\RecordOfService');
    }

    /**
     * @return bool
     */
    public function isHasAllowance()
    {
        return (bool)$this->allowance;
    }

    /**
     * @param $vacancy_id
     * @return bool
     */
    public function hasJobOffer($vacancy_id)
    {
        return (bool)JobOffer::where('unemployed_id', $this->id)->where('vacancy_id', $vacancy_id)->count();
    }
}
