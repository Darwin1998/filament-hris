<?php

namespace Database\Seeders;

use Database\Factories\EmployeesFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EmployeesFactory::new()->count(10)->create();
    }
}
