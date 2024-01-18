<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    use HasFactory;

    protected $table = 'as_blocks';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'soceity_id',
        'project_id',
        'block_code',
        'block_name',
        'description',
        'created_by',
        'updated_by',
    ];

    public function project(){
      return $this->hasOne(Project::class, 'id', 'project_id');
   }


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
   
}