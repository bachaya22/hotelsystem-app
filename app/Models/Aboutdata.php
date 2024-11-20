<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aboutdata extends Model
{
    use HasFactory;
    protected $table = 'aboutdatas';
    protected $fillable = [
        'title',
        'description',
        'image',
        'detail',
    ];
}
