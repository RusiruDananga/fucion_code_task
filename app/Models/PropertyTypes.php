<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyTypes extends Model
{
    protected $table = 'property_types';
    protected $guarded = [];

    use HasFactory;
}
