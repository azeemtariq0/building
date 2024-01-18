<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitResident extends Model
{
    use HasFactory;

    protected $table = 'as_unit_resident';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'soceity_id',
        'unit_id',
        'resident_name',
        'resident_cnic',
        'resident_mobile',
        'resident_email',
        'residing_since',
        'identity_type',
        'updated_by',
    ];

   public function unit(){
      return $this->hasOne(Unit::class, 'id', 'unit_id');
   }


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
   
}