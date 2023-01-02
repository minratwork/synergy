<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CovidCases extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'country',
        'date',
        'case'
    ];
}
