<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data_tech = config('tech');
        foreach ($data_tech as $data) {

            $tech = new Technology();
            $tech->label = $data['label'];
            $tech->color = $data['color'];
            $tech->info = $data['info'];
            $tech->save();
        }
    }
}
