<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub_questions')->truncate();

        $dt = Carbon::now();
        $dateNow = $dt->toDateTimeString();
        
        DB::table('sub_questions')->insert([
            [
                'question' => 'Fever',
                'field_type' => "radio",
                'options' => "Yes,No",
                'question_id' => 1,
                'template_id' => 1,
                'is_latest_version' => "true",
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'question' => 'Cough and/or Colds',
                'field_type' => "radio",
                'options' => "Yes,No",
                'question_id' => 1,
                'template_id' => 1,
                'is_latest_version' => "true",
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'question' => 'Body Pains',
                'field_type' => "radio",
                'options' => "Yes,No",
                'question_id' => 1,
                'template_id' => 1,
                'is_latest_version' => "true",
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'question' => 'Sore throat',
                'field_type' => "radio",
                'options' => "Yes,No",
                'question_id' => 1,
                'template_id' => 1,
                'is_latest_version' => "true",
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'question' => 'Fatigue / Tiredness',
                'field_type' => "radio",
                'options' => "Yes,No",
                'question_id' => 1,
                'template_id' => 1,
                'is_latest_version' => "true",
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'question' => 'Headache',
                'field_type' => "radio",
                'options' => "Yes,No",
                'question_id' => 1,
                'template_id' => 1,
                'is_latest_version' => "true",
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'question' => 'Diarrhea',
                'field_type' => "radio",
                'options' => "Yes,No",
                'question_id' => 1,
                'template_id' => 1,
                'is_latest_version' => "true",
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'question' => 'Loss of taste or smell',
                'field_type' => "radio",
                'options' => "Yes,No",
                'question_id' => 1,
                'template_id' => 1,
                'is_latest_version' => "true",
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'question' => 'Difficulty of breathing',
                'field_type' => "radio",
                'options' => "Yes,No",
                'question_id' => 1,
                'template_id' => 1,
                'is_latest_version' => "true",
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'question' => 'If yes, please specify which country you went to:',
                'field_type' => "text",
                'options' => null,
                'question_id' => 4,
                'template_id' => 1,
                'is_latest_version' => "true",
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'question' => 'If yes, please specify which city/municipality you went to:',
                'field_type' => "text",
                'options' => null,
                'question_id' => 5,
                'template_id' => 1,
                'is_latest_version' => "true",
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
        ]);
    }
}
