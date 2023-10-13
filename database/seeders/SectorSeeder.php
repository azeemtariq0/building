<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sector;

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sector::create(['sector_name' => 'AUTOMOBILE ASSEMBLER']);
        Sector::create(['sector_name' => 'AUTOMOBILE PARTS & ACCESSORIES']);
        Sector::create(['sector_name' => 'CABLE & ELECTRICAL GOODS']);
        Sector::create(['sector_name' => 'CEMENT']);
        Sector::create(['sector_name' => 'CHEMICAL']);
        Sector::create(['sector_name' => 'CLOSE - END MUTUAL FUND']);
        Sector::create(['sector_name' => 'COMMERCIAL BANKS']);
        Sector::create(['sector_name' => 'ENGINEERING']);
        Sector::create(['sector_name' => 'FERTILIZER']);
        Sector::create(['sector_name' => 'FOOD & PERSONAL CARE PRODUCTS']);
        Sector::create(['sector_name' => 'GLASS & CERAMICS']);
        Sector::create(['sector_name' => 'INSURANCE']);
        Sector::create(['sector_name' => 'INV. BANKS / INV. COS. / SECURITIES COS.']);
        Sector::create(['sector_name' => 'JUTE']);
        Sector::create(['sector_name' => 'LEASING COMPANIES']);
        Sector::create(['sector_name' => 'LEATHER & TANNERIES']);
        Sector::create(['sector_name' => 'MISCELLANEOUS']);
        Sector::create(['sector_name' => 'MODARABAS']);
        Sector::create(['sector_name' => 'OIL & GAS EXPLORATION COMPANIES']);
        Sector::create(['sector_name' => 'OIL & GAS MARKETING COMPANIES']);
        Sector::create(['sector_name' => 'PAPER & BOARD']);
        Sector::create(['sector_name' => 'PHARMACEUTICALS']);
        Sector::create(['sector_name' => 'POWER GENERATION & DISTRIBUTION']);
        Sector::create(['sector_name' => 'REFINERY']);
        Sector::create(['sector_name' => 'SUGAR & ALLIED INDUSTRIES']);
        Sector::create(['sector_name' => 'SYNTHETIC & RAYON']);
        Sector::create(['sector_name' => 'TECHNOLOGY & COMMUNICATION']);
        Sector::create(['sector_name' => 'TEXTILE COMPOSITE']);
        Sector::create(['sector_name' => 'TEXTILE SPINNING']);
        Sector::create(['sector_name' => 'TEXTILE WEAVING']);
        Sector::create(['sector_name' => 'TOBACCO']);
        Sector::create(['sector_name' => 'TRANSPORT']);
        Sector::create(['sector_name' => 'VANASPATI & ALLIED INDUSTRIES']);
        Sector::create(['sector_name' => 'WOOLLEN']);
        Sector::create(['sector_name' => 'REAL ESTATE INVESTMENT TRUST']);
        Sector::create(['sector_name' => 'EXCHANGE TRADED FUNDS']);
    }
}
