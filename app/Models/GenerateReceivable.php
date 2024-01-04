<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenerateReceivable extends Model
{
    use HasFactory;

    protected $table = 'as_generate_receivables';
    protected $fillable = [
      'unit_id',
      'date',
      'last_amount',
      'actual_amount',
      'created_at',

  ];
}
