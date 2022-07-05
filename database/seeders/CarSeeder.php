<?php

namespace Database\Seeders;

use App\Models\Car;
use Database\Factories\CarFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Car::factory(50)->create();
    }
}
