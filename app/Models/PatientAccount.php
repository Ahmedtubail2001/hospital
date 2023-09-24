<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientAccount extends Model
{
    use HasFactory;

        public function invoice()
    {
        return $this->belongsTo(single_invoice::class,'single_invoice_id');
    }
}