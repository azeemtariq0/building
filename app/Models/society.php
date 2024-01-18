<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Society extends Model
{
    use HasFactory;
    protected $table = 'as_society';

     protected $fillable = [
        'society_code',
        'society_title',
        'society_image'
    ];
}
