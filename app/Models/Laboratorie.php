<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratorie extends Model
{
    use HasFactory;

    public $fillable = ['description_en', 'description_ar', 'invoice_id', 'patient_id', 'doctor_id', '', '', '', '', ''];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

    public function getDescriptionLangAttribute()
    {
        if (app()->getLocale() == 'en') {
            return $this->description_en;
        } else {
            return $this->description_ar;
        }
    }
}