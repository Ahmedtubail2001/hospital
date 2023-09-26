<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patient extends Model
{
    use HasFactory;
    public $fillable = ['email', 'Password', 'Date_Birth', 'Phone', 'Gender', 'Blood_Group', 'name_en', 'Address_en', 'name_ar', 'Address_ar'];

    public function doctor()
    {
        return $this->belongsTo(Invoice::class, 'doctor_id');
    }

    public function service()
    {
        return $this->belongsTo(Invoice::class, 'Service_id');
    }

    public function getNameLangAttribute()
    {
        if (app()->getLocale() == 'en') {
            return $this->name_en;
        } else {
            return $this->name_ar;
        }
    }

    public function getAddressLangAttribute()
    {
        if (app()->getLocale() == 'en') {
            return $this->Address_en;
        } else {
            return $this->Address_ar;
        }
    }
}