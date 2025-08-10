<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectsFactory> */
    use HasFactory;

    protected $casts = [
        'images' => 'array',
    ];

    public function getImagesAttribute($value)
    {
        $arr = is_string($value) ? json_decode($value, true) : $value;
        $arr = is_array($arr) ? $arr : [];
        return array_values(array_filter($arr, fn ($v) => filled($v)));
    }

}
