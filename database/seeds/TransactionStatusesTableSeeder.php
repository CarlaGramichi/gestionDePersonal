<?php

use App\TransactionStatus;
use Illuminate\Database\Seeder;

class TransactionStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TransactionStatus::create([
            'name'        => 'started',
            'description' => 'Iniciado',
        ]);

        TransactionStatus::create([
            'name'        => 'pending',
            'description' => 'Pendiente',
        ]);

        TransactionStatus::create([
            'name'        => 'sended',
            'description' => 'Enviado',
        ]);

        TransactionStatus::create([
            'name'        => 'approved',
            'description' => 'Aprobado',
        ]);

        TransactionStatus::create([
            'name'        => 'finished',
            'description' => 'Finalizado',
        ]);
    }
}
