<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Catalogs\CatSatGroupingKey;

class CatSatGroupingKeySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CatSatGroupingKey::create([
            'id'                => 1,
            'identifier'        => "P-001",
            'name'              => 'Sueldos, Salarios Rayas y Jornales',
        ]);
        CatSatGroupingKey::create([
            'id'                => 2,
            'identifier'        => "P-002",
            'name'              => 'Gratificación Anual (Aguinaldo)',
        ]);
        CatSatGroupingKey::create([
            'id'                => 3,
            'identifier'        => "P-003",
            'name'              => 'Participación de los Trabajadores en las Utilidades PTU',
        ]);
        CatSatGroupingKey::create([
            'id'                => 4,
            'identifier'        => "P-004",
            'name'              => 'Reembolso de Gastos Médicos Dentales y Hospitalarios',
        ]);
        CatSatGroupingKey::create([
            'id'                => 5,
            'identifier'        => "P-005",
            'name'              => 'Fondo de Ahorro',
        ]);
        CatSatGroupingKey::create([
            'id'                => 6,
            'identifier'        => "P-006",
            'name'              => 'Caja de Ahorro',
        ]);
        CatSatGroupingKey::create([
            'id'                => 7,
            'identifier'        => "P-009",
            'name'              => 'Contribuciones a Cargo del Trabajador Pagadas por el Patrón',
        ]);
        CatSatGroupingKey::create([
            'id'                => 8,
            'identifier'        => "P-010",
            'name'              => 'Premios por puntualidad',
        ]);
    }
}
