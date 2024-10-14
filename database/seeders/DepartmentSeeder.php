<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('department')->truncate();

        $dt = Carbon::now();
        $dateNow = $dt->toDateTimeString();
        
        DB::table('department')->insert([
            [
                'department' => 'ACCOUNTING',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'department' => 'CORPORATE HR',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'department' => 'ENTERPRISE',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'department' => 'EXECOM',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'department' => 'INSIDE SALES',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'department' => 'LOGISTICS',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'department' => 'MSP- PASIG',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'department' => 'MSP- PASIG- SOFTWARE DEV',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'department' => 'PAYROLL',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'department' => 'PMO',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'department' => 'PRE-SALES',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'department' => 'PURCHASING',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'department' => 'SALES OPERATIONS & MARKETING',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'department' => 'SERVICES',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'department' => 'TALENT ACQUISITION',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'department' => 'TECHNICAL SERVICES',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'department' => 'TREASURY',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'department' => 'UNQ',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
        ]);
    }
}



















