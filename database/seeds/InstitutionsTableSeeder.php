<?php

use App\Institution;
use Illuminate\Database\Seeder;

class InstitutionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Institution::create([
            'cue'        => '1000733',
            'name'       => 'Instituto de educación superior Clara J. Armstrong',
            'department' => 'Capital',
            'city'       => 'Catamarca',
            'state'      => 'San Fernando del Valle de Catamarca',
            'country'    => 'Argentina',
        ]);
    }
}
