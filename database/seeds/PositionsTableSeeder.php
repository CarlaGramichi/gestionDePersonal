<?php

use App\Position;
use Illuminate\Database\Seeder;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $positions = [

            'Cargos de conducción',
            'Cargos de apoyo',
            'Cargos no docentes',
            'Horas institucionales',
            'Docente',
        ];

        foreach ($positions as $position) {
            Position::create([
                'year'       => now()->format('Y'),
                'name'       => $position,
                'is_deleted' => '0'
            ]);
        }
    }
}
