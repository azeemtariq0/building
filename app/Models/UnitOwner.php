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
        'soceity_id',
        'unit_id',
        'owner_name',
        'owner_cnic',
        'identity_type',
        'mobile_no',
        'ptcl_no',
        'owner_address',
        'owner_contact',
        'owner_email',
        'owner_since',
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