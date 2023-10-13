<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SMAAppTokens extends Model
{
    use HasFactory;
    protected $table = 'tbl_sma_app_tokens';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bearer_token',
        'client_code',
    ];
}