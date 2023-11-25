<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $table = 'as_expenses';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'exp_code',
        'exp_category_id',
        'exp_date',
        'year',
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