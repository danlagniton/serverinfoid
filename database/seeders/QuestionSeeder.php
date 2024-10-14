<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->truncate();

        $dt = Carbon::now();
        $dateNow = $dt->toDateTimeString();
        
        DB::table('questions')->insert([
            [
                'question' => 'Are you experiencing or did you have any of the following in the last 14 days?',
                'field_type' => "radio",
                'options' => "Yes,No",
                'template_id' => 1,
                'is_latest_version' => "true",
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'question' => "Have you had face-to-face contact with a probable or confirmed COVID-19 case within 1 meter and for more than 15 minutes for the past 14 days?",
                'field_type' => "radio",
                'options' => "Yes,No",
                'template_id' => 1,
                'is_latest_version' => "true",
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'question' => 'Have you provided direct care for a patient with probable or confirmed COVID-19 case without using proper "Personal Protective Equipment (PPE)" for the past 14 days?',
                'field_type' => "radio",
                'options' => "Yes,No",
                'template_id' => 1,
                'is_latest_version' => "true",
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'question' => "Have you traveled outside the Philippines in the last 14 days?",
                'field_type' => "radio",
                'options' => "Yes,No",
                'template_id' => 1,
                'is_latest_version' => "true",
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'question' => "Have you traveled outside the current city/municipality where you reside?",
                'field_type' => "radio",
                'options' => "Yes,No",
                'template_id' => 1,
                'is_latest_version' => "true",
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
        ]);
    }
}
