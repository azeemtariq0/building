<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class receipt extends Model
{
    use HasFactory;

    protected $table = 'as_receipts';
    protected $fillable = [
      'project_id',
      'block_id',
      'unit_id',
      'unit_category_id',
      'description',
      'receipt_date',
      'amount',
      'status'
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



}
