<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    use HasFactory;
    public $fillable = ['insurance_code', 'discount_percentage', 'Company_rate', 'status', 'name_en', 'name_ar', 'notes_en', 'notes_ar'];

    public function getNameLangAttribute()
    {
        if (app()->getLocale() == 'en') {
            return $this->name_en;
        } else {
            return $this->name_ar;
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
}