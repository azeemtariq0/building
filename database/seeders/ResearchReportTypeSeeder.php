<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ResearchReportType;

class ResearchReportTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ResearchReportType::create(['report_type_title' => 'Macro']);
        ResearchReportType::create(['report_type_title' => 'Strategy']);
        ResearchReportType::create(['report_type_title' => 'None']);
    }
}
