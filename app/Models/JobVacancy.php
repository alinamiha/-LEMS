<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobVacancy extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'type_of_working',
        'post',
        'form_of_work',
        'company_name',
        'address',
        'description',
        'sales',
    ];

    public function employer()
    {

        return $this->belongsTo('App\Models\Employer');
    }
    public function jobOffer(){
        return$this->hasMany('App\Model\JobOffer');
    }
}
