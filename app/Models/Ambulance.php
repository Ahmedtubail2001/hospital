<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ambulance extends Model
{
    use HasFactory;
    public $fillable = ['car_number', 'car_model_en', 'car_model_ar', 'driver_license_number', 'driver_phone', 'is_available', 'car_type', 'driver_name_en', 'driver_name_ar', 'notes_en', 'notes_ar'];

    public function getNameLangAttribute()
    {
        if (app()->getLocale() == 'en') {
            return $this->driver_name_en;
        } else {
            return $this->driver_name_ar;
        }
    }

    public function getNotesLangAttribute()
    {
        if (app()->getLocale() == 'en') {
            return $this->notes_en;
        } else {
            return $this->notes_ar;
        }
    }

        public function getCarModelLangAttribute()
    {
        if (app()->getLocale() == 'en') {
            return $this->car_model_en;
        } else {
            return $this->car_model_ar;
        }
    }
}