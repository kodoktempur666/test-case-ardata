<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class HumanResourcesSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create();

        DB::table('employees')->insert([
            [
                'full_name' => 'Firman Maulana',
                'email' => 'firman@example.com',
                'phone_number' => '081234567890',
                'address' => 'Jl. Kelahang Sokaraja No. 10',
                'birth_date' => '2003-01-01',
                'hire_date' => Carbon::now(),
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'full_name' => 'Naufal Ananta',
                'email' => 'naufal@example.com',
                'phone_number' => '089876543210',
                'address' => 'Jl. Pekalongan No. 1',
                'birth_date' => '2004-05-20',
                'hire_date' => Carbon::now(),
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'full_name' => 'Frido afriyanto',
                'email' => 'fredocx@example.com',
                'phone_number' => '089879873222',
                'address' => 'Jl. Pemalang No. 2',
                'birth_date' => '2004-05-20',
                'hire_date' => Carbon::now(),
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'full_name' => 'Danuar Ihza Mahendra',
                'email' => 'danuar@example.com',
                'phone_number' => '0865826365832',
                'address' => 'Jl. Jambi No. 4',
                'birth_date' => '2004-05-20',
                'hire_date' => Carbon::now(),
                'status' => 'active',
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
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => $faker->sentence(3),
                'description' => $faker->paragraph,
                'assigned_to' => 2,
                'due_date' => Carbon::parse('2025-02-20'),
                'status' => 'pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        DB::table('presences')->insert([
            [
                'employee_id' => 1,
                'check_in' => Carbon::parse('2025-02-10 09:00:00'),
                'check_out' => Carbon::parse('2025-02-10 17:00:00'),
                'date' => Carbon::parse('2025-02-10'),
                'status' => 'present',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'employee_id' => 2,
                'check_in' => Carbon::parse('2025-02-10 09:05:00'),
                'check_out' => Carbon::parse('2025-02-10 17:10:00'),
                'date' => Carbon::parse('2025-02-10'),
                'status' => 'present',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
