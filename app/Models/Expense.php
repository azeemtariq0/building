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
        'soceity_id',
        'exp_code',
        'project_id',
        'block_id',
        'exp_category_id',
        'exp_date',
        'year',
        'payee',
        'total_amount',
        'description',
        'created_by',
        'updated_by'
    ];

    public function block(){
      return $this->hasOne(Block::class, 'id', 'block_id');
   }
    public function project(){
      return $this->hasOne(Project::class, 'id', 'project_id');
   }
    public function expense_category(){
      return $this->hasOne(ExpenseCategory::class, 'id', 'exp_category_id');
   }
   public function expense_detail(){
      return $this->hasMany(ExpenseDetail::class, 'expense_id', 'id');
   }


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
   
}