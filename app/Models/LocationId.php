<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationId extends Model
{
    use HasFactory;

    protected $table = 'location_id';

    protected $fillable = ['location_id'];

}
