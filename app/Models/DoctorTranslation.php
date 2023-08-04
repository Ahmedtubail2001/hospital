<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorTranslation extends Model
{
    use HasFactory, Translatable;
    public $translatedAttributes = ['name', 'appointments'];
    public $timestamps = false;
}