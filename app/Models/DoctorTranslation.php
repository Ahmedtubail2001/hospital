<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorTranslation extends Model
{
    use HasFactory;
    public $translatedAttributes = ['name'];
    protected $table = 'doctor_translations';
    public $timestamps = false;
}