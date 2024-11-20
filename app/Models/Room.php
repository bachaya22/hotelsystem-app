<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $table = 'rooms';

    // Specify the fillable fields to allow mass assignment
    protected $fillable = [
        'roomtitle',
        'roomtype',
        'price',
        'image',
        'descrption',  // There is a typo in 'description' here; check if it's intentional.
        'wifi',
    ];
}
