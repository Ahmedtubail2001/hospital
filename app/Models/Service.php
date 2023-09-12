<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = ['price', 'description_en', 'description_ar', 'status', 'name_ar', 'name_en'];

    public function getNameLangAttribute()
    {
        if (app()->getLocale() == 'en') {
            return $this->name_en;
        } else {
            return $this->name_ar;
        }
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