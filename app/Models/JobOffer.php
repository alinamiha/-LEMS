<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class JobOffer extends Model
{
    use HasFactory;
    public function unemployed()
    {
        return $this->belongsTo('App\Models\Unemployed');
    }

    public function vacancies(){
        return$this->belongsTo('App\Model\JobVacancy');
    }

    public function offerAccept($id){
        $offer = JobOffer::find($id);
        $offer->status = 1;
        $offer->save();
        return back();
    }
    public function offerDenied($id){
        $offer = JobOffer::find($id);
        $offer->status = 2;
        $offer->save();
        return back();
    }
}
