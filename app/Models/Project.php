<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

  protected $table = 'as_projects';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'soceity_id',
        'project_code',
        'project_name',
        'description',
        'union_name',
        'union_president',
        'union_voice_president',
        'union_secretary',
        'union_joint_secretary',
        'union_accountant',
        'union_other_1',
        'union_other_2',
        'union_other_3',
        'union_other_4'
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
   
}