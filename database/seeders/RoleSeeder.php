<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->truncate();

        $dt = Carbon::now();
        $dateNow = $dt->toDateTimeString();
        
        DB::table('roles')->insert([
            [
                'role' => 'Admin',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'role' => 'Nurse',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'role' => 'Requestor',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
        ]);
    }
}
