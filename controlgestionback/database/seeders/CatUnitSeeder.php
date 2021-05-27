<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Catalogs\CatUnit;

class CatUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CatUnit::create([
            'id' => 1,
            'name' =>'Dirección Ejecutiva',
            'code' => '10-001-00',
            'cat_dependency_id' => 1,
            'number' => 10
        ]);
        CatUnit::create([
            'id' => 2,
            'name' =>'Dirección Adjunta de Administración',
            'code' => '20-002-00',
            'cat_dependency_id' => 1,
            'number' => 20
        ]);
        CatUnit::create([
            'id' => 3,
            'name' =>'Dirección Adjunta de Innovación y Conocimiento',
            'code' => '30-003-00',
            'cat_dependency_id' => 1,
            'number' => 30
        ]);
        CatUnit::create([
            'id' => 4,
            'name' =>'Gerencia de Capital Humano',
            'code' => '31-004-00',
            'cat_dependency_id' => 1,
            'number' => 31
        ]);
        CatUnit::create([
            'id' => 5,
            'name' =>'Gerencia de Innovación',
            'code' => '34-007-00',
            'cat_dependency_id' => 1,
            'number' => 34
        ]);
        CatUnit::create([
            'id' => 6,
            'name' =>'Gerencia de Investigación',
            'code' => '36-006-00',
            'cat_dependency_id' => 1,
            'number' => 36
        ]);
        CatUnit::create([
            'id' => 7,
            'name' =>'Dirección Adjunta de Desarrollo Tecnológico',
            'code' => '40-008-00',
            'cat_dependency_id' => 1,
            'number' => 40
        ]);
        CatUnit::create([
            'id' => 8,
            'name' => 'Gerencia de Administración Integral de Infraestructura',
            'code' => '42-010-00',
            'cat_dependency_id' => 1,
            'number' => 42
        ]);
        CatUnit::create([
            'id' => 9,
            'name' => 'Gerencia de Sistemas de Información Estratégicos',
            'code' => '43-011-00',
            'cat_dependency_id' => 1,
            'number' => 43
        ]);
        CatUnit::create([
            'id' => 10,
            'name' => 'Gerencia de Incubación Tecnológica y de Negocio',
            'code' => '44-016-00',
            'cat_dependency_id' => 1,
            'number' => 44
        ]);
        CatUnit::create([
            'id' => 11,
            'name' => 'Dirección Adjunta de Administración de Proyectos',
            'code' => '50-012-00',
            'cat_dependency_id' => 1,
            'number' => 50
        ]);
        CatUnit::create([
            'id' => 12,
            'name' => 'Órgano Interno de Control',
            'code' => '60-013-00',
            'cat_dependency_id' => 1,
            'number' => 60
        ]);
        CatUnit::create([
            'id' => 13,
            'name' => 'Dirección Adjunta de Competitividad',
            'code' => '70-014-00',
            'cat_dependency_id' => 1,
            'number' => 70
        ]);
        CatUnit::create([
            'id' => 14,
            'name' => 'Gerencia de Consultoría Estratégica',
            'code' => '72-017-00',
            'cat_dependency_id' => 1,
            'number' => 72
        ]);
        CatUnit::create([
            'id' => 15,
            'name' => 'Ventanilla Única Nacional',
            'code' => '75-2054-01',
            'cat_dependency_id' => 1,
            'number' => 75
        ]);
        CatUnit::create([
            'id' => 16,
            'name' => 'Dirección Adjunta de Desarrollo de Software',
            'code' => '80-021-00',
            'cat_dependency_id' => 1,
            'number' => 80
        ]);
        CatUnit::create([
            'id' => 17,
            'name' => 'Gerencia de Nuevos Productos',
            'code' => '82-024-00',
            'cat_dependency_id' => 1,
            'number' => 82
        ]);
        CatUnit::create([
            'id' => 18,
            'name' => 'Servicios en Sitio',
            'code' => '75-023-00',
            'cat_dependency_id' => 1,
            'number' => 75
        ]);
        CatUnit::create([
            'id' => 19,
            'name' =>'Gerencia de Asuntos Jurídicos',
            'code' => '24-028-00',
            'cat_dependency_id' => 1,
            'number' => 24
        ]);
        CatUnit::create([
            'id' => 20,
            'name' =>'Dirección Adjunta de Asuntos Jurídicos',
            'code' => '90-032-00',
            'cat_dependency_id' => 1,
            'number' => 90
        ]);
        \DB::statement('ALTER SEQUENCE cat_units_id_seq RESTART WITH 19');
    }
}
