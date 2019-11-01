<?php

use App\Relationship;
use Illuminate\Database\Seeder;

class RelationshipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $relationships = [
            'Hermano/a',
            'Primo/a',
            'Tío/a',
            'Sobrino/a',
            'Abuelo/a',
            'Esposo/a',
            'Otro',
        ];

        foreach ($relationships as $relationship) {
            Relationship::create([
                'name'       => $relationship,
                'is_deleted' => '0'
            ]);
        }
    }
}
