<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
        CreateAdminUserSeeder::class,
        ResearchAnalystSeeder::class,
        ResearchReportCategorySeeder::class,
        ResearchReportTypeSeeder::class,
        SectorSeeder::class,
        StockCompaniesSeeder::class,
        PermissionTableSeeder::class,
    ]);
    }
}
