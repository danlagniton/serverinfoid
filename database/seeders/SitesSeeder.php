<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SitesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sites')->truncate();

        $dt = Carbon::now();
        $dateNow = $dt->toDateTimeString();
        
        DB::table('sites')->insert([
            [
                'site_name' => 'Pasig',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'site_name' => 'Clark',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'site_name' => 'Balibago',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'site_name' => 'Savers',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
        ]);
    }
}
