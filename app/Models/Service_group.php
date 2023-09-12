<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service_group extends Model
{
    use HasFactory;
    protected $table = "service_group";
    protected $fillable = ['Group_id', 'Service_id', 'quantity'];

    public function Service()
    {
        $this->belongsTo(Service::class, 'Service_id');
    }

    public function getNameLangAttribute()
    {
        if (app()->getLocale() == 'en') {
            return $this->Services_en;
        } else {
            return $this->Services_ar;
        }
    }
}