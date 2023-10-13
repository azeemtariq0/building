<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResearchReportCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'research_report_categories';
}
