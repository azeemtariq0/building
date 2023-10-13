<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ResearchReportCategory;

class ResearchReportCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ResearchReportCategory::create(['category_title' => 'In Focus']);
        ResearchReportCategory::create(['category_title' => 'BMA Technical View']);
        ResearchReportCategory::create(['category_title' => 'BMA Flashnote']);
        ResearchReportCategory::create(['category_title' => 'The Week in Review']);
    }
}
