<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('templates')->truncate();

        $dt = Carbon::now();
        $dateNow = $dt->toDateTimeString();
        
        DB::table('templates')->insert([
            [
                'template_name' => 'Health Declaration Form',
                'instructions' => 'Please answer on the appropriate column of your response.',
                'form_footer' => 'I hereby certify that the information given is true, correct and complete. I understand that failure to answer any question or any falsified response may have serious consequences. I understand that my personal information is protected by RA 10173 or the Data Privacy Act of 2012 and that this form will be destroyed after 20 days from the date of accomplishment.',
                'user_id' => '2',
                'status' => 'Active',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'template_name' => 'Sample Form 2',
                'instructions' => 'Instructions.',
                'form_footer' => 'Footer.',
                'user_id' => '2',
                'status' => 'Inactive',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            // [
            //     'template_name' => 'Sample Form 3',
            //     'instructions' => 'Instructions.',
            //     'form_footer' => 'Footer.',
            //     'user_id' => '2',
            //     'status' => 'Inactive',
            //     'created_at' => $dateNow,
            //     'updated_at' => $dateNow,
            // ],
            // [
            //     'template_name' => 'Sample Form 4',
            //     'instructions' => 'Instructions.',
            //     'form_footer' => 'Footer.',
            //     'user_id' => '2',
            //     'status' => 'Inactive',
            //     'created_at' => $dateNow,
            //     'updated_at' => $dateNow,
            // ],
            // [
            //     'template_name' => 'Sample Form 5',
            //     'instructions' => 'Instructions.',
            //     'form_footer' => 'Footer.',
            //     'user_id' => '2',
            //     'status' => 'Inactive',
            //     'created_at' => $dateNow,
            //     'updated_at' => $dateNow,
            // ],
            // [
            //     'template_name' => 'Sample Form 6',
            //     'instructions' => 'Instructions.',
            //     'form_footer' => 'Footer.',
            //     'user_id' => '2',
            //     'status' => 'Inactive',
            //     'created_at' => $dateNow,
            //     'updated_at' => $dateNow,
            // ],
            // [
            //     'template_name' => 'Sample Form 7',
            //     'instructions' => 'Instructions.',
            //     'form_footer' => 'Footer.',
            //     'user_id' => '2',
            //     'status' => 'Inactive',
            //     'created_at' => $dateNow,
            //     'updated_at' => $dateNow,
            // ],
            // [
            //     'template_name' => 'Sample Form 8',
            //     'instructions' => 'Instructions.',
            //     'form_footer' => 'Footer.',
            //     'user_id' => '2',
            //     'status' => 'Inactive',
            //     'created_at' => $dateNow,
            //     'updated_at' => $dateNow,
            // ],
            // [
            //     'template_name' => 'Sample Form 9',
            //     'instructions' => 'Instructions.',
            //     'form_footer' => 'Footer.',
            //     'user_id' => '2',
            //     'status' => 'Inactive',
            //     'created_at' => $dateNow,
            //     'updated_at' => $dateNow,
            // ],
            // [
            //     'template_name' => 'Sample Form 10',
            //     'instructions' => 'Instructions.',
            //     'form_footer' => 'Footer.',
            //     'user_id' => '2',
            //     'status' => 'Inactive',
            //     'created_at' => $dateNow,
            //     'updated_at' => $dateNow,
            // ],
            // [
            //     'template_name' => 'Sample Form 11',
            //     'instructions' => 'Instructions.',
            //     'form_footer' => 'Footer.',
            //     'user_id' => '2',
            //     'status' => 'Inactive',
            //     'created_at' => $dateNow,
            //     'updated_at' => $dateNow,
            // ],
        ]);
    }
}
