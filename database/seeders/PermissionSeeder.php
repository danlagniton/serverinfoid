<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->truncate();

        $dt = Carbon::now();
        $dateNow = $dt->toDateTimeString();
        
        DB::table('permissions')->insert([
            // templates permissions
            [
                'permission' => 'view_templates_list',
            ],
            [
                'permission' => 'add_template',
            ],
            [
                'permission' => 'view_template',
            ],
            [
                'permission' => 'edit_template',
            ],
            [
                'permission' => 'delete_template',
            ],

            // user management permissions
            [
                'permission' => 'view_users_list',
            ],
            [
                'permission' => 'add_user',
            ],
            [
                'permission' => 'view_user',
            ],
            [
                'permission' => 'edit_user',
            ],

            // questions permissions
            [
                'permission' => 'view_questions_list',
            ],
            [
                'permission' => 'add_question',
            ],
            [
                'permission' => 'view_question',
            ],
            [
                'permission' => 'edit_question',
            ],
            [
                'permission' => 'delete_question',
            ],

            // subquestions permissions
            [
                'permission' => 'view_sub_questions_list',
            ],
            [
                'permission' => 'add_sub_question',
            ],
            [
                'permission' => 'view_sub_question',
            ],
            [
                'permission' => 'edit_sub_question',
            ],
            [
                'permission' => 'delete_sub_question',
            ],

            // roles permissions
            [
                'permission' => 'view_roles_list',
            ],
            [
                'permission' => 'view_role',
            ],
            
            // submitted forms permissions
            [
                'permission' => 'edit_submitted_form_status',
            ],

            // sites permissions
            [
                'permission' => 'view_sites_page'
            ],
            [
                'permission' => 'add_site'
            ],
            [
                'permission' => 'edit_site'
            ],
            [
                'permission' => 'delete_site'
            ],

        ]);
    }
}
