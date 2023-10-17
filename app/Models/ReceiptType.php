<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceiptType extends Model
{
    use HasFactory;

    protected $table = 'as_receipt_types';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'receipt_code',
        'receipt_name',
        'description',
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
   
}