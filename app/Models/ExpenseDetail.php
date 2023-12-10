<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseDetail extends Model
{
    use HasFactory;

    protected $table = 'as_expense_detail';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

       protected $fillable = [
        'expense_id',
        'reference_no',
        'reference_date',
        'amount',
        'description',
    ];


    public function expense_category(){
      return $this->hasOne(ExpenseCategory::class, 'id', 'expense_category_id');
   }


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
   
}