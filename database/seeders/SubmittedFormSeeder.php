<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubmittedFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('submitted_forms')->truncate();

        $dt = Carbon::now();
        $dateNow = $dt->toDateTimeString();
        
        DB::table('submitted_forms')->insert([
            [
                'form_name' => 'STARK_HEALTH_DECLARATION_FORM_05012022',
                'template_id' => 1,
                'user_id' => 5,
                'appointment_schedule' => Carbon::createFromFormat('m-d-Y, H:i:s', '05-01-2022, 10:00:00'),
                'status' => 'For Approval',
                'approval_date' => null,
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'form_name' => 'PARKER_HEALTH_DECLARATION_FORM_05022022',
                'template_id' => 1,
                'user_id' => 4,
                'appointment_schedule' => Carbon::createFromFormat('m-d-Y, H:i:s', '05-02-2022, 10:00:00'),
                'status' => 'Approved',
                'approval_date' => null,
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'form_name' => 'ROGERS_HEALTH_DECLARATION_FORM_05032022',
                'template_id' => 1,
                'user_id' => 6,
                'appointment_schedule' => Carbon::createFromFormat('m-d-Y, H:i:s', '05-03-2022, 10:00:00'),
                'status' => 'Rejected',
                'approval_date' => null,
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'form_name' => 'ROGERS_HEALTH_DECLARATION_FORM_05042022',
                'template_id' => 1,
                'user_id' => 6,
                'appointment_schedule' => Carbon::createFromFormat('m-d-Y, H:i:s', '05-04-2022, 10:00:00'),
                'status' => 'Approved',
                'approval_date' => null,
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            
        ]);
    }
}
