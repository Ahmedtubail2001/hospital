<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceiptAccount extends Model
{
    use HasFactory;

    public function patients()
    {
        return $this->belongsTo(patient::class, 'patient_id');
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