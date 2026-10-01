<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Carbon;

class Patient extends Model
{
    protected $fillable = [
    'full_name',
    'suffix',
    'date_of_birth',
    'gender',
    'email',
    'address',
    ];

    protected function age(): Attribute
    {
    return Attribute::make(
        get: fn () => Carbon::parse($this->date_of_birth)->age,
    );
    }
}
