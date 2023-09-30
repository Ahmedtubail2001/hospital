<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    public function Service()
    {
        return $this->belongsTo(Service::class, 'Service_id');
    }

    public function Patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function Doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

    public function Section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function Group()
    {
        return $this->belongsTo(Groups::class, 'Group_id');
    }
    
}