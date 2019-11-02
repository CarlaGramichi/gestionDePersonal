<?php

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
                    'name'   => 'rector',
                    'quota'  => 1,
                    'points' => 679,
                ],
                [
                    'name'   => 'secretario académico',
                    'quota'  => 1,
                    'points' => 679,
                ],
            ],
            [
                [
                    'name'   => 'bedel',
                    'quota'  => 1,
                    'points' => 679,
                ],
                [
                    'name'   => 'bibliotecario',
                    'quota'  => 1,
                    'points' => 679,
                ],
            ],
        ];
    }
}
