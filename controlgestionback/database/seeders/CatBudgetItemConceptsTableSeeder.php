<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class CatBudgetItemConceptsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cat_budget_item_concepts')->delete();
        
        \DB::table('cat_budget_item_concepts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'chapter' => 1,
                'concept' => 1,
                'code' => '1100',
                'description' => 'Remuneraciones al personal de carácter permanente',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'chapter' => 1,
                'concept' => 2,
                'code' => '1200',
                'description' => 'Remuneraciones al personal de carácter transitorio',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'chapter' => 1,
                'concept' => 3,
                'code' => '1300',
                'description' => 'Remuneraciones adicionales y especiales',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'chapter' => 1,
                'concept' => 4,
                'code' => '1400',
                'description' => 'Seguridad social',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'chapter' => 1,
                'concept' => 5,
                'code' => '1500',
                'description' => 'Otras prestaciones sociales y económicas',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'chapter' => 1,
                'concept' => 6,
                'code' => '1600',
                'description' => 'Previsiones',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'chapter' => 1,
                'concept' => 7,
                'code' => '1700',
                'description' => 'Pago de estímulos a servidores públicos',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'chapter' => 2,
                'concept' => 1,
                'code' => '2100',
                'description' => 'Materiales de Administracion, Emision de Documentos y Articulos Oficiales',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'chapter' => 2,
                'concept' => 2,
                'code' => '2200',
                'description' => 'Alimentos y Utensilios',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'chapter' => 2,
                'concept' => 3,
                'code' => '2300',
                'description' => 'Materias Primas y Materiales de Produccion y Comercializacion',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'chapter' => 2,
                'concept' => 4,
                'code' => '2400',
                'description' => 'Materiales y Articulos de Construccion y de Reparacion',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'chapter' => 2,
                'concept' => 5,
                'code' => '2500',
                'description' => 'Productos Quimicos, Farmaceuticos y de Laboratorio',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'chapter' => 2,
                'concept' => 6,
                'code' => '2600',
                'description' => 'Combustibles, Lubricantes y Aditivos',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'chapter' => 2,
                'concept' => 7,
                'code' => '2700',
                'description' => 'Vestuario, Blancos, Prendas de Proteccion y Articulos deportivos',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'chapter' => 2,
                'concept' => 8,
                'code' => '2800',
                'description' => 'Materiales y Suministros para Seguridad',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'chapter' => 2,
                'concept' => 9,
                'code' => '2900',
                'description' => 'Herramientas, Refacciones y Accesorios Menores',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'chapter' => 3,
                'concept' => 1,
                'code' => '3100',
                'description' => 'Servicios Basicos',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'chapter' => 3,
                'concept' => 2,
                'code' => '3200',
                'description' => 'Servicios de Arrendamiento',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'chapter' => 3,
                'concept' => 3,
                'code' => '3300',
                'description' => 'Servicios Profesionales, Cientificos, Tecnicos y Otros Servicios',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'chapter' => 3,
                'concept' => 4,
                'code' => '3400',
                'description' => 'Servicios Financieros, Bancarios y Comerciales',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'chapter' => 3,
                'concept' => 5,
                'code' => '3500',
                'description' => 'Servicios de Instalacion, Reparacion, Mantenimiento y Conservacion',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'chapter' => 3,
                'concept' => 6,
                'code' => '3600',
                'description' => 'Servicios de Comunicacion Social y Publicidad',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'chapter' => 3,
                'concept' => 7,
                'code' => '3700',
                'description' => 'Servicios de Traslado y Viaticos',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}