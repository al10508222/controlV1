<?php

namespace Database\Seeders\Catalogs;

use Illuminate\Database\Seeder;
use App\Models\Catalogs\CatPaymentStatuses;

class CatPaymentStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        CatPaymentStatuses::create([
            'id'                => 1,
            'name'              => 'CREADO',
        ]);
        CatPaymentStatuses::create([
            'id'                => 2,
            'name'              => 'APROBADO',
        ]);
        
        CatPaymentStatuses::create([
            'id'                => 3,
            'name'              => 'RECHAZADO',
        ]);

        CatPaymentStatuses::create([
            'id'                => 4,
            'name'              => 'PENDIENTE DE PAGO',
        ]);

        CatPaymentStatuses::create([
            'id'                => 5,
            'name'              => 'PAGADO',
        ]);

        CatPaymentStatuses::create([
            'id'                => 6,
            'name'              => 'PAGO RECHAZADO',
        ]);

        CatPaymentStatuses::create([
            'id'                => 7,
            'name'              => 'REVISIÓN DE ACTIVIDADES',
        ]);

        CatPaymentStatuses::create([
            'id'                => 8,
            'name'              => 'REVISIÓN DE ADMINISTRADOR',
        ]);

        CatPaymentStatuses::create([
            'id'                => 9,
            'name'              => 'COMPLEMENTO CARGADO',
        ]);

        CatPaymentStatuses::create([
            'id'                => 10,
            'name'              => 'RECHAZO POR ADMINISTRADOR',
        ]);
        
        CatPaymentStatuses::create([
            'id'                => 11,
            'name'              => 'FINALIZADO',
        ]);

    }
}
