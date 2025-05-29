<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class humanresourcesSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create();

               DB::table('departments')->insert([
            [
                'name' => 'HR',  // Changed from 'title' to 'name'
                'description' => 'Human resources',
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'IT',  // Changed from 'title' to 'name'
                'description' => 'department information technology',
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Sales',  // Changed from 'title' to 'name'
                'description' => 'department sales',
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
        ]);


        DB::table('roles')->insert([
            [
                'title' => 'HR',
                'description' => 'bertanggung jawab human resources',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Developer',
                'description' => 'bertanggung jawab Develop',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Sales',
                'description' => 'bertanggung jawab human penjualan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        DB::table('employees')->insert([
            [
                'full_name' => 'Firman maulana',
                'email' => 'fredocx4@example.com',
                'phone_number' => '081234567890',
                'address' => 'Jl. klahang sokaraja No. 10',
                'birth_date' => '2003-01-01',
                'hire_date' => now(),
                'department_id' => 1, // HR
                'role_id' => 1,       // Manager
                'status' => 'active',
                'salary' => 10000000.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'full_name' => 'Naufal ananta',
                'email' => 'anantanaufal250@example.com',
                'phone_number' => '089876543210',
                'address' => 'Jl. pekalongan No. 5',
                'birth_date' => '2004-05-20',
                'hire_date' => Carbon::now(),
                'department_id' => 2, // IT
                'role_id' => 2,       // Developer
                'status' => 'active',
                'salary' => 8400000.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'full_name' => 'Danuar Ihza Mahendra',
                'email' => 'danuar@example.com',
                'phone_number' => '0898765534530',
                'address' => 'Jl. jambi No. 5',
                'birth_date' => '2004-08-21',
                'hire_date' => Carbon::now(),
                'department_id' => 3, // IT
                'role_id' => 3,       // Developer
                'status' => 'active',
                'salary' => 8300000.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'full_name' => 'Frido Afrityanto',
                'email' => 'fredo@example.com',
                'phone_number' => '0898769876510',
                'address' => 'Jl. pemalang No. 5',
                'birth_date' => '2004-02-28',
                'hire_date' => Carbon::now(),
                'department_id' => 3,
                'role_id' => 3,
                'status' => 'active',
                'salary' => 8200000.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
        DB::table('tasks')->insert([
            [
                'title' => $faker->sentence(3),
                'description' => $faker->paragraph,
                'assigned_to' => 1,
                'due_date' => Carbon::parse('2025-02-15'),
                'status' => 'pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => $faker->sentence(3),
                'description' => $faker->paragraph,
                'assigned_to' => 1,
                'due_date' => Carbon::parse('2025-02-15'),
                'status' => 'pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);

        DB::table('payroll')->insert([
            [
                'employee_id' => 1,
                'salary' => 10000000.00,
                'bonuses' => 200000.00,
                'deduction' => 500000.00,
                'net_salary' => 200000.00,
                'pay_date' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'employee_id' => 2,
                'salary' => 8400000.00,
                'bonuses' => 200000.00,
                'deduction' => 500000.00,
                'net_salary' => 200000.00,
                'pay_date' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'employee_id' => 3,
                'salary' => 8200000.00,
                'bonuses' => 200000.00,
                'deduction' => 500000.00,
                'net_salary' => 200000.00,
                'pay_date' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'employee_id' => 4,
                'salary' => 8100000.00,
                'bonuses' => 200000.00,
                'deduction' => 500000.00,
                'net_salary' => 200000.00,
                'pay_date' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);

        DB::table('presences')->insert([
            [
                'employee_id' => 1,
                'check_in' => Carbon::parse('2025-02-10 09:00:00'),
                'check_out' => Carbon::parse('2025-02-10 17:00:00'),
                'date' => Carbon::parse("2025-02-10"),
                'status' => 'present',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'employee_id' => 2,
                'check_in' => Carbon::parse('2025-02-10 09:00:00'),
                'check_out' => Carbon::parse('2025-02-10 17:00:00'),
                'date' => Carbon::parse("2025-02-10"),
                'status' => 'present',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'employee_id' => 3,
                'check_in' => Carbon::parse('2025-02-10 09:00:00'),
                'check_out' => Carbon::parse('2025-02-10 17:00:00'),
                'date' => Carbon::parse("2025-02-10"),
                'status' => 'present',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'employee_id' => 4,
                'check_in' => Carbon::parse('2025-02-10 09:00:00'),
                'check_out' => Carbon::parse('2025-02-10 17:00:00'),
                'date' => Carbon::parse("2025-02-10"),
                'status' => 'present',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

        ]);

        DB::table('leave_requests')->insert([
            [
                'employee_id' => 1,
                'leave_type' => 'Haji',
                'start_date' => Carbon::parse('2025-02-20'),
                'end_date' => Carbon::parse('2025-02-23'),
                'status' => 'pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'employee_id' => 2,
                'leave_type' => 'Menikah',
                'start_date' => Carbon::parse('2025-03-20'),
                'end_date' => Carbon::parse('2025-03-23'),
                'status' => 'pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
