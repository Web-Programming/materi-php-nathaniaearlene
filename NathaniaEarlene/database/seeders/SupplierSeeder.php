<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Suppoert\Str;
use App\Models\Supplier;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Supplier::factory(50)->create();

        // DB::table('suppliers')->insert([
        //     'name' => fake()->company(),
        //     'contact_number' => fake()->phoneNumber(),
        //     'address' => fake()->address(),
        // ]);
    }
}
