<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles_permissions')->truncate();

        $dt = Carbon::now();
        $dateNow = $dt->toDateTimeString();
        
        DB::table('roles_permissions')->insert([
            // admin permissions
            [
                'role_id' => 1,
                'permission_id' => 1, //view_templates_list
            ],
            [
                'role_id' => 1,
                'permission_id' => 2, //add_template
            ],
            [
                'role_id' => 1,
                'permission_id' => 3, //view_template
            ],
            [
                'role_id' => 1,
                'permission_id' => 4, //edit_template
            ],
            [
                'role_id' => 1,
                'permission_id' => 5, //delete_template
            ],
            [
                'role_id' => 1,
                'permission_id' => 6, //view_users_list
            ],
            [
                'role_id' => 1,
                'permission_id' => 7, //add_user
            ],
            [
                'role_id' => 1,
                'permission_id' => 8, //view_user
            ],
            [
                'role_id' => 1,
                'permission_id' => 9, //edit_user
            ],
            [
                'role_id' => 1,
                'permission_id' => 10, //view_questions_list
            ],
            [
                'role_id' => 1,
                'permission_id' => 11, //add_question
            ],
            [
                'role_id' => 1,
                'permission_id' => 12, //view_question
            ],
            [
                'role_id' => 1,
                'permission_id' => 13, //edit_question
            ],
            [
                'role_id' => 1,
                'permission_id' => 14, //delete_question
            ],
            [
                'role_id' => 1,
                'permission_id' => 15, //view_sub_questions_list
            ],
            [
                'role_id' => 1,
                'permission_id' => 16, //add_sub_question
            ],
            [
                'role_id' => 1,
                'permission_id' => 17, //view_sub_question
            ],
            [
                'role_id' => 1,
                'permission_id' => 18, //edit_sub_question
            ],
            [
                'role_id' => 1,
                'permission_id' => 19, //delete_sub_question
            ],
            [
                'role_id' => 1,
                'permission_id' => 20, //view_roles_list
            ],
            [
                'role_id' => 1,
                'permission_id' => 21, //view_role
            ],

            // nurse permissions
            [
                'role_id' => 2,
                'permission_id' => 1, //view_templates_list
            ],
            [
                'role_id' => 2,
                'permission_id' => 2, //add_template
            ],
            [
                'role_id' => 2,
                'permission_id' => 3, //view_template
            ],
            [
                'role_id' => 2,
                'permission_id' => 4, //edit_template
            ],
            [
                'role_id' => 2,
                'permission_id' => 5, //delete_template
            ],
            [
                'role_id' => 2,
                'permission_id' => 6, //view_users_list
            ],
            [
                'role_id' => 2,
                'permission_id' => 10, //view_questions_list
            ],
            [
                'role_id' => 2,
                'permission_id' => 11, //add_question
            ],
            [
                'role_id' => 2,
                'permission_id' => 12, //view_question
            ],
            [
                'role_id' => 2,
                'permission_id' => 13, //edit_question
            ],
            [
                'role_id' => 2,
                'permission_id' => 14, //delete_question
            ],
            [
                'role_id' => 2,
                'permission_id' => 15, //view_sub_questions_list
            ],
            [
                'role_id' => 2,
                'permission_id' => 16, //add_sub_question
            ],
            [
                'role_id' => 2,
                'permission_id' => 17, //view_sub_question
            ],
            [
                'role_id' => 2,
                'permission_id' => 18, //edit_sub_question
            ],
            [
                'role_id' => 2,
                'permission_id' => 19, //delete_sub_question
            ],
            [
                'role_id' => 2,
                'permission_id' => 22, //edit_submitted_form_status
            ],
        ]);
    }
}
