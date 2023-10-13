<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResearchUpload extends Model
{
   use HasFactory, SoftDeletes;

   protected $table = 'research_uploads';

   protected $fillable = [
      'company_id',
      'sector_id',
      'is_company',
      'is_sector',
      'title',
      'rpt_category_id',
      'rpt_analyst_id',
      'rpt_type_id',
      'description',
      'doc_org_name',
      'doc_new_name',
   ];

   public function company(){
      return $this->hasOne(StockCompanies::class, 'id', 'company_id');
   }

   public function sector(){
      return $this->hasOne(Sector::class, 'id', 'sector_id');
   }

   public function rpt_category(){
      return $this->hasOne(ResearchReportCategory::class, 'id', 'rpt_category_id');
   }

   public function rpt_analyst(){
      return $this->hasOne(ResearchAnalyst::class, 'id', 'rpt_analyst_id')->withTrashed();
   }

   public function rpt_type(){
      return $this->hasOne(ResearchReportType::class, 'id', 'rpt_type_id');
   }
}
