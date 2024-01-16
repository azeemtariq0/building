<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class society extends Model
{
    use HasFactory;
    protected $table = 'society';

     protected $fillable = [
        'Society_code',
        'society_title',
        'society_image'
    ];
}
