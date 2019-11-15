<?php

use App\PositionType;
use Illuminate\Database\Seeder;

class PositionTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $position_types = [
            [
                [
                    'name'   => 'Rector',
                    'quota'  => 1,
                    'points' => 679,
                ],
                [
                    'name'   => 'secretario académico',
                    'quota'  => 1,
                    'points' => 567,
                ],
            ],
            [
                [
                    'name'   => 'bedel',
                    'quota'  => 10,
                    'points' => 294,
                ],
                [
                    'name'   => 'bibliotecario',
                    'quota'  => 1,
                    'points' => 291,
                ],
                [
                    'name'   => 'Jefe de departamento alumnos',
                    'quota'  => 1,
                    'points' => 300,
                ],
                [
                    'name'   => 'Jefe de extensión',
                    'quota'  => 1,
                    'points' => 301,
                ],
                [
                    'name'   => 'Jefe de grado',
                    'quota'  => 1,
                    'points' => 301,
                ],
                [
                    'name'   => 'Jefe de investigación',
                    'quota'  => 1,
                    'points' => 301,
                ],
                [
                    'name'   => 'Secretario técnico',
                    'quota'  => 1,
                    'points' => 347,
                ],
            ],
            [
                [
                    'name'   => 'Administrativos',
                    'quota'  => 3,
                    'points' => 12,
                ],
                [
                    'name'   => 'Administrativos',
                    'quota'  => 1,
                    'points' => 17,
                ],
                [
                    'name'   => 'Administrativos',
                    'quota'  => 1,
                    'points' => 18,
                ],
                [
                    'name'   => 'Servicios generales',
                    'quota'  => 1,
                    'points' => 0,
                ],
            ],
            [
                [
                    'name'   => 'Horas institucionales',
                    'quota'  => 1,
                    'points' => 0,
                ],
            ],
            [
                [
                    'name'   => 'Docente',
                    'quota'  => 1,
                    'points' => 0,
                ],
            ]

        ];

        foreach ($position_types as $position_id => $position_type) {
            foreach ($position_type as $item) {
                PositionType::create([
                    'position_id' => $position_id + 1,
                    'name'        => $item['name'],
                    'quota'       => $item['quota'],
                    'points'      => $item['points'],
                ]);
            }
        }
    }
}
