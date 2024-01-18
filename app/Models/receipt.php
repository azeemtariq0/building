<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;

    protected $table = 'as_receipts';
    protected $fillable = [
      'soceity_id',
      'receipt_type_id',
      'receipt_date',
      'project_id',
      'block_id',
      'unit_id',
      'unit_category_id',
      'description',
      'year',
      'amount',
      'status',
      'created_by',
      'updated_by'
  ];
     

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function block()
    {
        return $this->belongsTo(Block::class,'block_id');
    }

    public function unit_category(){
      return $this->hasOne(UnitCategory::class, 'id', 'unit_category_id');
   }
    public function unit()
    {
        return $this->belongsTo(Unit::class,'unit_id');
    }
    public function receipt_type()
    {
        return $this->belongsTo(ReceiptType::class,'receipt_type_id','id');
    }
   
   


}
