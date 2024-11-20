<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $table = 'galleries';

    // Specify the fillable fields to allow mass assignment
    protected $fillable = [
        'image',
    ];
}
