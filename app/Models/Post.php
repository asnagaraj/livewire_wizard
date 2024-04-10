<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Carbon\Carbon;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'dob'
    ];

    protected function dob():Attribute
    {
        return new Attribute(
            get:fn ($value) => Carbon::parse($value)->format('m/d/y'),
            set:fn ($value) => Carbon::parse($value)->format('Y-m-d'),
        );
    }
}
