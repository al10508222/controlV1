<?php

namespace Database\Seeders\System;

use Illuminate\Database\Seeder;
use App\Models\System\SystemPaymentConfig;

class SystemPaymentConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SystemPaymentConfig::create([
            'payment_method' => 'PPD',
            'voucher_type'   => 'I',
            'currency'       => 'MXN',
            'qty'            => '1',
            'payment_way'    => '99',
            'tax_regime'     => '612',
            'voucher_usage'  => 'P01',
            'unity_key'      => 'ACT',
            'unity'          => 'Actividad',
            'description'    => 'Servicios Profesionales Correspondientes al proyecto @key',
        ]);
    }
}
