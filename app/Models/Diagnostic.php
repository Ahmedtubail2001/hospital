<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnostic extends Model
{
    use HasFactory;

    public function getDiagnosisLangAttribute()
    {
        if (app()->getLocale() == 'en') {
            return $this->diagnosis_en;
        } else {
            return $this->diagnosis_ar;
        }

    }

    public function Doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }
}