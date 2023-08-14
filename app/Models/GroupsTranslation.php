<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupsTranslation extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'notes'];
    public $timestamps = false;
}