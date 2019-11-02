<?php

use App\Level;
use Illuminate\Database\Seeder;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $levels = [
            'Inicial',
            'Primario',
            'Secundario',
            'Superior',
            'Terciario',
            'Universitario',
        ];

        foreach ($levels as $level) {
            Level::create([
                'name' => $level,
            ]);
        }
    }
}
