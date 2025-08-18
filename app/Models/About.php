<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    /** @use HasFactory<\Database\Factories\AboutFactory> */
    use HasFactory;

    protected $fillable = [
        'our_history',
        'emails', 
        'phones',
        'company_creation_date',
        'awards',
        'logo',
        'address',
        'country',
        'city',
        'social_medias',
    ];

    protected $casts = [
        'emails' => 'array',
        'phones' => 'array',
        'social_medias' => 'array',
    ];

}
