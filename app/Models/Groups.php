<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    use HasFactory;
    public $fillable = ['Total_before_discount', 'discount_value', 'Total_after_discount', 'tax_rate', 'Total_with_tax', 'Services_en', 'note_en', 'Services_ar', 'note_ar'];

    public function service_group()
    {
        return $this->hasMany(Service_group::class, 'Group_id');
    }

    public function getNameLangAttribute()
    {
        if (app()->getLocale() == 'en') {
            return $this->Services_en;
        } else {
            return $this->Services_ar;
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