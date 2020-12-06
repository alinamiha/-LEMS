<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordOfService extends Model
{
    use HasFactory;
    public function unemployed()
    {
        return $this->belongsTo('App\Models\Unemployed');
    }
}
