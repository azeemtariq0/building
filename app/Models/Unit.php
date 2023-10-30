<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $table = 'as_units';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'unit_code',
        'unit_name',
        'project_id',
        'block_id',
        'unit_category_id',
        'unit_size',
        'out_standing_amount',
        'ob_date',
        'current_owner',
        'current_tenant',
    ];

    public function project(){
      return $this->hasOne(Project::class, 'id', 'project_id');
   }

   public function block(){
      return $this->hasOne(Block::class, 'id', 'block_id');
   }

   public function unit_category(){
      return $this->hasOne(UnitCategory::class, 'id', 'unit_category_id');
   }


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
   
}