<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Doctor extends Authenticatable
{
    use HasFactory;
    public $fillable = ['email', 'email_verified_id', 'password', 'phone', 'name_en', 'name_ar', 'section_id', 'status'];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
    public function doctorappointments()
    {
        return $this->belongsToMany(Appointment::class, 'appointment_doctor');
    }

    public function getNameLangAttribute()
    {
        if (app()->getLocale() == 'en') {
            return $this->name_en;
        } else {
            return $this->name_ar;
        }

    }
}