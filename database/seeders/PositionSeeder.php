<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('position')->truncate();

        $dt = Carbon::now();
        $dateNow = $dt->toDateTimeString();
        
        DB::table('position')->insert([
            [
                'position' => 'ACCOUNT DIRECTOR',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'ACCOUNT DIRECTOR SR.',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'ACCOUNT MANAGER',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'ACCOUNTING SUPERVISOR',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'ACOUNTS PAYABLE SPECIALIST',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'ADMIN ASSISTANT',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'AREA HEAD',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'AREA HEAD- NORTH',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'BILLING & COLLECTION ASST.',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'BILLING SUPERVISOR',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'BUSINESS ANALYST',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'BUSINESS DEVELOPMENT OFFICER',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'BUSINESS UNIT HEAD',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'CABLING DESIGN ENGINEER',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'CABLING DEV\'T MANAGER',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'CHIEF ADMIN OFFICER',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'CHIEF TECHNOLOGY OFFICER',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'COLLECTION SPECIALIST',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'COMPANY NURSE',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'CORPORATE RECRUITMENT SUPERVISOR',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'CSR LEAD',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'CUSTOMER SERVICE ENGINEER - L1',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'CUSTOMER SERVICE ENGINEER- L1',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'CUSTOMER SERVICE ENGR LVL. 1',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'CUSTOMER SERVICE REPRESENTATIVE',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'DATA CABLING TECHNICIAN',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'DESIGN LEAD',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'DEVNET ENGINEER',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'DIRECTOR, PRODUCT ENGG. & DESIGN',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'DIRECTOR, SALES OPERATIONS AND MARKETING',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'DRIVER',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'DRIVER',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'EXECUTIVE ASSISTANT/RECEPTIONIST',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'FACILITY COORDINATOR',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'FINANCE & ACCOUNTING HEAD',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'FTTB HEAD',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'GENERAL MANAGER',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'GENERAL SERVICES SUPERVISOR',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'GL ACCOUNTANT',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'HEAD OF HUMAN RESOURCES',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'HELP DESK SUPPORT',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'HELPDESK SUPPORT ENGINEER',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'HR ASSISTANT',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'HR BUSINESS PARTNER',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'HRSSS MANAGER',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'INVENTORY CONTROL SPECIALIST',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'IT TECHNICAL SUPPORT',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'JANITOR',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'JR SOFTWARE ENGINEER',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'JUNIOR CAD ENGINEER',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'LEAD DEVELOPMENT REPRESENTATIVE',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'LEAD FOR NETWORK & SECURITY',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'LEARNING AND DEVELOPMENT MANAGER',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'MARKETING OFFICER',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'MSP DIRECTOR',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'MULTIMEDIA ARTIST',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'NOC ENGINEER',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'PAYROLL SUPERVISOR',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'PMO HEAD',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'PRESALES MANAGER',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'PRESIDENT/CEO',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'PROCUREMENT SPECIALIST',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'PROJECT COORDINATOR',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'PROJECT MANAGER',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'QA ASSOCIATE',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'QUALITY ASSURANCE ANALYST',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'SALES ADMIN ASSISTANT',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'SAQ -HEAD',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'SAQ -OFFICER',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'SENIOR CAD ENGINEER',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'SERVICE DELIVERY MANAGER',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'SITE ENGINEER',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'SOCIAL MEDIA MANAGER',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'SOFTWARE DELIVERY MANAGER',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'SOFTWARE DEVELOPER',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'SOFTWARE ENGINEER',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'SOLUTIONS ARCHITECT',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'SOLUTIONS ENGINEER',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'SR. ACCOUNT MANAGER',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'SUPPLY CHAIN HEAD',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'SYSTEM AND DATABASE ADMINISTRATOR',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'SYSTEMS ENGINEER',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'TALENT ACQUISITION MANAGER',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'TALENT ACQUISITION SUPERVISOR',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'TALENT ACQUSITION SPECIALIST',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'TECH SUPPORT ENGINEER',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'TECHNICAL DIRECTOR',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'TECHNICAL MANAGER',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'TECHNICAL SUPPORT ENGINEER',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'TECHNICAL SUPPORT MANAGER',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'TECHNOLOGY LEAD',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'TREASURY MANAGER',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'VICE PRESIDENT FOR PRODUCT',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'VICE PRESIDENT FOR SALES',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'WAREHOUSE MANAGER',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'WAREHOUSE STOCKMAN',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'position' => 'WAREHOUSE STOCKMAN/ DRIVER',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
        ]);
    }
}
