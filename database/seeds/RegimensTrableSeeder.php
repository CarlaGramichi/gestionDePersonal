<?php

use App\Regimen;
use Illuminate\Database\Seeder;

class RegimensTrableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regimens = [
            [
                'name'         => '1er Cuatrimestre',
                'abbreviation' => '1C',
                'start_date'   => '2019-01-02',
                'end_date'     => '2019-05-09',
            ],
            [
                'name'         => '2do Cuatrimestre',
                'abbreviation' => '2C',
                'start_date'   => '2019-06-15',
                'end_date'     => '2019-11-30',
            ],
            [
                'name'         => 'Anual',
                'abbreviation' => 'A',
                'start_date'   => '2019-01-02',
                'end_date'     => '2019-11-30',
            ],

        ];

        foreach ($regimens as $regimen) {
            Regimen::create([
                'name' => $regimen['name'],
                'abbreviation' => $regimen['abbreviation'],
                'start_date' => $regimen['start_date'],
                'end_date' => $regimen['end_date'],
            ]);
        }
    }
}
