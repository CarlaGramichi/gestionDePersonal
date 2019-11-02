<?php

use App\Shift;
use Illuminate\Database\Seeder;

class ShiftsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shifts = [
            [
                'name'=>'Mañana',
                'start_time'=>'07:00',
                'end_time'=>'12:00',
            ],
            [
                'name'=>'Tarde',
                'start_time'=>'14:00',
                'end_time'=>'18:00',
            ],
            [
                'name'=>'Noche',
                'start_time'=>'19:00',
                'end_time'=>'23:00',
            ],
        ];

        foreach ($shifts as $shift) {
            Shift::create([
                'name' => $shift['name'],
                'start_time' => $shift['start_time'],
                'end_time' => $shift['end_time'],
            ]);
        }
    }
}
