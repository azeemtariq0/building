<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitOwner extends Model
{
    use HasFactory;

    protected $table = 'as_unit_owners';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'unit_id',
        'owner_name',
        'owner_cnic',
        'mobile_no',
        'ptcl_no',
        'owner_address',
        'owner_contact',
        'owner_email',
        'owner_since',
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