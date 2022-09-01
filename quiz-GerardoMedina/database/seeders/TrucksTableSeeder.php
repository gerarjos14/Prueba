<?php

namespace Database\Seeders;

use App\Models\Truck;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrucksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trucks')->delete();

        Truck::create([
            'name' => 'Pablo Perez',
            'support_kg' => 3200,
        ]);

        Truck::create([
            'name' => 'Juan Carlos Ochoa',
            'support_kg' => 2000,
        ]);

        Truck::create([
            'name' => 'Benito Martinez',
            'support_kg' => 1500,
        ]);

        Truck::create([
            'name' => 'Antonio Martinez',
            'support_kg' => 1700,
        ]);

        Truck::create([
            'name' => 'Piccasso Ochoa',
            'support_kg' => 2230,
        ]);
    }
}
