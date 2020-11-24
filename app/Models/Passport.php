<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passport extends Model
{
    use HasFactory;
    protected $fillable = [
        'document_name',
        'number',
        'date_of_issue',
        'issued_by',
        'TIN_number'
    ];
}
