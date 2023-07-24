<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class itenary extends Model
{
    use HasFactory;

    protected $fillable = [
        'trip_id','day','description','id'
    ];
}
