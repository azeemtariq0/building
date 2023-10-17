<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitCategory extends Model
{
    use HasFactory;

    protected $table = 'as_unit_categories';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'unit_cat_code',
        'unit_cat_name',
        'monthly_amount',
        'description',
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
   
}