<?php

namespace Database\Seeders;

use Database\Factories\DepartmentFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DepartmentFactory::new()->count(5)->create();
    }
}