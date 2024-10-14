<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        $dt = Carbon::now();
        $dateNow = $dt->toDateTimeString();
        
        DB::table('users')->insert([
            [
                'last_name' => 'Admin',
                'first_name' => 'Company',
                'middle_name' => null,
                'address' => '123 Street Pasig',
                'email' => 'admin@test.com',
                'contact_number' => '09181234567',
                'is_uas_employee' => 'true',
                'company_name' => 'UAS',
                'department_id' => 4,
                'position_id' => 2,
                'is_active' => 'true',
                'is_locked' => 'false',
                'failed_attempts' => '0',
                'role_id' => 1, // admin
                'password' => Hash::make("p@ssw0rd"),
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'last_name' => 'Nurse',
                'first_name' => 'Company',
                'middle_name' => null,
                'address' => '123 Street Pasig',
                'email' => 'nurse@test.com',
                'contact_number' => '09181234567',
                'is_uas_employee' => 'true',
                'company_name' => 'UAS',
                'department_id' => 4,
                'position_id' => 2,
                'is_active' => 'true',
                'is_locked' => 'false',
                'failed_attempts' => '0',
                'role_id' => 2, // nurse
                'password' => Hash::make("p@ssw0rd"),
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'last_name' => 'Requestor',
                'first_name' => 'Company',
                'middle_name' => null,
                'address' => '123 Street Pasig',
                'email' => 'requestor@test.com',
                'contact_number' => '09181234567',
                'is_uas_employee' => 'true',
                'company_name' => 'UAS',
                'department_id' => 4,
                'position_id' => 2,
                'is_active' => 'true',
                'is_locked' => 'false',
                'failed_attempts' => '0',
                'role_id' => 3, // requestor
                'password' => Hash::make("p@ssw0rd"),
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            // [
            //     'last_name' => 'Antonio',
            //     'first_name' => 'Joshua Martin',
            //     'middle_name' => null,
            //     'address' => 'Angono Rizal',
            //     'email' => 'jmantonio@uas.com.ph',
            //     'contact_number' => '09181234567',
            //     'is_uas_employee' => 'true',
            //     'company_name' => 'Universal Access and Systems Solutions',
            //     'department_id' => 4,
            //     'position_id' => 2,
            //     'is_active' => 'true',
            //     'is_locked' => 'false',
            //     'failed_attempts' => '0',
            //     'role_id' => 3, // requestor
            //     'password' => Hash::make("p@ssw0rd"),
            //     'created_at' => $dateNow,
            //     'updated_at' => $dateNow,
            // ],
            // [
            //     'last_name' => 'Parker',
            //     'first_name' => 'Peter',
            //     'middle_name' => null,
            //     'address' => '123 Street Pasig',
            //     'email' => 'peter@test.com',
            //     'contact_number' => '09181234567',
            //     'is_uas_employee' => 'true',
            //     'company_name' => 'UAS',
            //     'department_id' => 4,
            //     'position_id' => 2,
            //     'is_active' => 'true',
            //     'is_locked' => 'false',
            //     'failed_attempts' => '0',
            //     'role_id' => 3, // requestor
            //     'password' => Hash::make("p@ssw0rd"),
            //     'created_at' => $dateNow,
            //     'updated_at' => $dateNow,
            // ],
            // [
            //     'last_name' => 'Stark',
            //     'first_name' => 'Tony',
            //     'middle_name' => null,
            //     'address' => '123 Street Pasig',
            //     'email' => 'tony@test.com',
            //     'contact_number' => '09181234567',
            //     'is_uas_employee' => 'true',
            //     'company_name' => 'UAS',
            //     'department_id' => 4,
            //     'position_id' => 2,
            //     'is_active' => 'true',
            //     'is_locked' => 'false',
            //     'failed_attempts' => '0',
            //     'role_id' => 3, // requestor
            //     'password' => Hash::make("p@ssw0rd"),
            //     'created_at' => $dateNow,
            //     'updated_at' => $dateNow,
            // ],
            // [
            //     'last_name' => 'Rogers',
            //     'first_name' => 'Steve',
            //     'middle_name' => null,
            //     'address' => '123 Street Pasig',
            //     'email' => 'steve@test.com',
            //     'contact_number' => '09181234567',
            //     'is_uas_employee' => 'true',
            //     'company_name' => 'UAS',
            //     'department_id' => 4,
            //     'position_id' => 2,
            //     'is_active' => 'true',
            //     'is_locked' => 'false',
            //     'failed_attempts' => '0',
            //     'role_id' => 3, // requestor
            //     'password' => Hash::make("p@ssw0rd"),
            //     'created_at' => $dateNow,
            //     'updated_at' => $dateNow,
            // ],
            // [
            //     'last_name' => 'Barton',
            //     'first_name' => 'Clint',
            //     'middle_name' => null,
            //     'address' => '123 Street Pasig',
            //     'email' => 'clint@test.com',
            //     'contact_number' => '09181234567',
            //     'is_uas_employee' => 'true',
            //     'company_name' => 'UAS',
            //     'department_id' => 4,
            //     'position_id' => 2,
            //     'is_active' => 'true',
            //     'is_locked' => 'false',
            //     'failed_attempts' => '0',
            //     'role_id' => 3, // requestor
            //     'password' => Hash::make("p@ssw0rd"),
            //     'created_at' => $dateNow,
            //     'updated_at' => $dateNow,
            // ],
            // [
            //     'last_name' => 'Barton',
            //     'first_name' => 'Clint Hawkeye',
            //     'middle_name' => null,
            //     'address' => '123 Street Pasig',
            //     'email' => 'clintH@test.com',
            //     'contact_number' => '09181234567',
            //     'is_uas_employee' => 'true',
            //     'company_name' => 'UAS',
            //     'department_id' => 4,
            //     'position_id' => 2,
            //     'is_active' => 'true',
            //     'is_locked' => 'false',
            //     'failed_attempts' => '0',
            //     'role_id' => 3, // requestor
            //     'password' => Hash::make("p@ssw0rd"),
            //     'created_at' => $dateNow,
            //     'updated_at' => $dateNow,
            // ]
        ]);
    }
}
