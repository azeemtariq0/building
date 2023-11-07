<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class receipt extends Model
{
    use HasFactory;

    protected $table = 'as_receipts';

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function block()
    {
        return $this->belongsTo(Block::class,'erp_user_id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class,'erp_user_id');
    }



}
