<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ResearchAnalyst;

class ResearchAnalystSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ResearchAnalyst::create(['analyst_name' => 'Ailia Naeem']);
        ResearchAnalyst::create(['analyst_name' => 'BMA Research']);
        ResearchAnalyst::create(['analyst_name' => 'Faizan Ahmed']);
        ResearchAnalyst::create(['analyst_name' => 'Syed Ali Ahmed Zaidi']);
        ResearchAnalyst::create(['analyst_name' => 'Abdul Rahman']);
        ResearchAnalyst::create(['analyst_name' => 'Kamal Ahmed']);
        ResearchAnalyst::create(['analyst_name' => 'Noor Huda Shaikh']);
        ResearchAnalyst::create(['analyst_name' => 'Taha Madani']);
        ResearchAnalyst::create(['analyst_name' => 'Shuja Ahmed']);
    }
}
