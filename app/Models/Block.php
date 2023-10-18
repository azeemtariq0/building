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
        'project_id',
        'block_code',
        'block_name',
        'description',
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