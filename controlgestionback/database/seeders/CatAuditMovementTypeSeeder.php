<?php

namespace Database\Seeders;

use App\Models\CatAuditMovementType;
use Illuminate\Database\Seeder;

class CatAuditMovementTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CatAuditMovementType::create([
            'id'    => CatAuditMovementType::CREATE,
            'name'  => 'Creación',
        ]);

        CatAuditMovementType::create([
            'id'    => CatAuditMovementType::UPDATE,
            'name'  => 'Edición',
        ]);

        CatAuditMovementType::create([
            'id'    => CatAuditMovementType::DELETE,
            'name'  => 'Eliminación',
        ]);

        CatAuditMovementType::create([
            'id'    => CatAuditMovementType::MASSIVE_LOAD,
            'name'  => 'Carga masiva',
        ]);
    }
}
