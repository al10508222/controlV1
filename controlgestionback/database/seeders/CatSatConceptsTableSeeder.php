<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class CatSatConceptsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cat_sat_concepts')->delete();
        
        \DB::table('cat_sat_concepts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Sueldos, Salarios Rayas y Jornales',
                'identifier' => '001',
                'cat_concept_type_id' => 1,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
            'name' => 'Gratificación Anual (Aguinaldo)',
                'identifier' => '002',
                'cat_concept_type_id' => 1,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Participación de los Trabajadores en las Utilidades PTU',
                'identifier' => '003',
                'cat_concept_type_id' => 1,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Reembolso de Gastos Médicos Dentales y Hospitalarios',
                'identifier' => '004',
                'cat_concept_type_id' => 1,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Fondo de Ahorro',
                'identifier' => '005',
                'cat_concept_type_id' => 1,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Caja de ahorro',
                'identifier' => '006',
                'cat_concept_type_id' => 1,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Contribuciones a Cargo del Trabajador Pagadas por el Patrón',
                'identifier' => '009',
                'cat_concept_type_id' => 1,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Premios por puntualidad',
                'identifier' => '010',
                'cat_concept_type_id' => 1,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Prima de Seguro de vida',
                'identifier' => '011',
                'cat_concept_type_id' => 1,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Seguro de Gastos Médicos Mayores',
                'identifier' => '012',
                'cat_concept_type_id' => 1,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Cuotas Sindicales Pagadas por el Patrón
',
                'identifier' => '013
',
                'cat_concept_type_id' => 1,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Subsidios por incapacidad',
                'identifier' => '014',
                'cat_concept_type_id' => 1,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Becas para trabajadores y/o hijos',
                'identifier' => '015',
                'cat_concept_type_id' => 1,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Horas extra',
                'identifier' => '019',
                'cat_concept_type_id' => 1,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Prima dominical',
                'identifier' => '020',
                'cat_concept_type_id' => 1,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Prima vacacional',
                'identifier' => '021',
                'cat_concept_type_id' => 1,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Prima por antigüedad',
                'identifier' => '022',
                'cat_concept_type_id' => 1,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Pagos por separación',
                'identifier' => '023',
                'cat_concept_type_id' => 1,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Seguro de retiro',
                'identifier' => '024',
                'cat_concept_type_id' => 1,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Indemnizaciones',
                'identifier' => '025',
                'cat_concept_type_id' => 1,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'Reembolso por funeral',
                'identifier' => '026',
                'cat_concept_type_id' => 1,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'Cuotas de seguridad social pagadas por el patrón',
                'identifier' => '027',
                'cat_concept_type_id' => 1,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'Comisiones',
                'identifier' => '028',
                'cat_concept_type_id' => 1,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'Vales de despensa',
                'identifier' => '029',
                'cat_concept_type_id' => 1,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'Vales de restaurante',
                'identifier' => '030',
                'cat_concept_type_id' => 1,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'Vales de gasolina',
                'identifier' => '031',
                'cat_concept_type_id' => 1,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'Vales de ropa',
                'identifier' => '032',
                'cat_concept_type_id' => 1,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'Ayuda para renta',
                'identifier' => '033',
                'cat_concept_type_id' => 1,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'Ayuda para artículos escolares',
                'identifier' => '034',
                'cat_concept_type_id' => 1,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'Ayuda para anteojos',
                'identifier' => '035',
                'cat_concept_type_id' => 1,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'Ayuda para transporte',
                'identifier' => '036',
                'cat_concept_type_id' => 1,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'Ayuda para gastos de funeral',
                'identifier' => '037',
                'cat_concept_type_id' => 1,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'Otros ingresos por salarios',
                'identifier' => '038',
                'cat_concept_type_id' => 1,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'Jubilaciones, pensiones o haberes de retiro',
                'identifier' => '039',
                'cat_concept_type_id' => 1,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'Jubilaciones, pensiones o haberes de retiro en parcialidades',
                'identifier' => '044',
                'cat_concept_type_id' => 1,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'Ingresos en acciones o títulos valor que representan bienes',
                'identifier' => '045',
                'cat_concept_type_id' => 1,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'Ingresos asimilados a salarios',
                'identifier' => '046',
                'cat_concept_type_id' => 1,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 38,
                'name' => 'Alimentación diferentes a los establecidos en el Art 94 último párrafo LISR',
                'identifier' => '047',
                'cat_concept_type_id' => 1,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'id' => 39,
                'name' => 'Habitación',
                'identifier' => '048',
                'cat_concept_type_id' => 1,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'id' => 40,
                'name' => 'Premios por asistencia',
                'identifier' => '049',
                'cat_concept_type_id' => 1,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'id' => 41,
                'name' => 'Viáticos',
                'identifier' => '050',
                'cat_concept_type_id' => 1,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'id' => 42,
                'name' => 'Pagos por gratificaciones, primas, compensaciones, recompensas u otros a extrabajadores derivados de jubilación en parcialidades',
                'identifier' => '051',
                'cat_concept_type_id' => 1,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'id' => 43,
                'name' => 'Pagos que se realicen a extrabajadores que obtengan una jubilación en parcialidades derivados de la ejecución de resoluciones judicial o de un laudo',
                'identifier' => '052',
                'cat_concept_type_id' => 1,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'id' => 44,
                'name' => 'Pagos que se realicen a extrabajadores que obtengan una jubilación en una sola exhibición derivados de la ejecución de resoluciones judicial o de un laudo',
                'identifier' => '053',
                'cat_concept_type_id' => 1,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            44 => 
            array (
                'id' => 45,
                'name' => 'Seguridad social',
                'identifier' => '001',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            45 => 
            array (
                'id' => 46,
                'name' => 'ISR',
                'identifier' => '002',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            46 => 
            array (
                'id' => 47,
                'name' => 'Aportaciones a retiro, cesantía en edad avanzada y vejez.',
                'identifier' => '003',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            47 => 
            array (
                'id' => 48,
                'name' => 'Otras',
                'identifier' => '004',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            48 => 
            array (
                'id' => 49,
                'name' => 'Aportaciones a Fondo de vivienda',
                'identifier' => '005',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            49 => 
            array (
                'id' => 50,
                'name' => 'Descuento por incapacidad',
                'identifier' => '006',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            50 => 
            array (
                'id' => 51,
                'name' => 'Pensión alimenticia',
                'identifier' => '007',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            51 => 
            array (
                'id' => 52,
                'name' => 'Renta',
                'identifier' => '008',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            52 => 
            array (
                'id' => 53,
                'name' => 'Préstamos provenientes del Fondo Nacional de la Vivienda para los Trabajadores',
                'identifier' => '009',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            53 => 
            array (
                'id' => 54,
                'name' => 'Pago por crédito de vivienda',
                'identifier' => '010',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            54 => 
            array (
                'id' => 55,
                'name' => 'Pago de abonos INFONACOT',
                'identifier' => '011',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            55 => 
            array (
                'id' => 56,
                'name' => 'Anticipo de salarios',
                'identifier' => '012',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            56 => 
            array (
                'id' => 57,
                'name' => 'Pagos hechos con exceso al trabajador',
                'identifier' => '013',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            57 => 
            array (
                'id' => 58,
                'name' => 'Errores',
                'identifier' => '014',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            58 => 
            array (
                'id' => 59,
                'name' => 'Pérdidas',
                'identifier' => '015',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            59 => 
            array (
                'id' => 60,
                'name' => 'Averías',
                'identifier' => '016',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            60 => 
            array (
                'id' => 61,
                'name' => 'Adquisición de artículos producidos por la empresa o establecimiento',
                'identifier' => '017',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            61 => 
            array (
                'id' => 62,
                'name' => 'Cuotas para la constitución y fomento de sociedades cooperativas y cajas de ahorro',
                'identifier' => '018',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            62 => 
            array (
                'id' => 63,
                'name' => 'Cuotas sindicales',
                'identifier' => '019',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            63 => 
            array (
                'id' => 64,
            'name' => 'Ausencia (Ausentismo)',
                'identifier' => '020',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            64 => 
            array (
                'id' => 65,
                'name' => 'Cuotas obrero patronales',
                'identifier' => '021',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            65 => 
            array (
                'id' => 66,
                'name' => 'Impuestos Locales',
                'identifier' => '022',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            66 => 
            array (
                'id' => 67,
                'name' => 'Aportaciones voluntarias',
                'identifier' => '023',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            67 => 
            array (
                'id' => 68,
            'name' => 'Ajuste en Gratificación Anual (Aguinaldo) Exento',
                'identifier' => '024',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            68 => 
            array (
                'id' => 69,
            'name' => 'Ajuste en Gratificación (Aguinaldo) Gravado',
                'identifier' => '025',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            69 => 
            array (
                'id' => 70,
                'name' => 'Ajuste en Participación de los Trabajadores en las Utilidades PTU Exento',
                'identifier' => '026',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            70 => 
            array (
                'id' => 71,
                'name' => 'Ajuste en Participación de los Trabajadores en las Utilidades PTU Gravado',
                'identifier' => '027',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            71 => 
            array (
                'id' => 72,
                'name' => 'Ajuste en Reembolso de Gastos Médicos Dentales y Hospitalarios Exento',
                'identifier' => '028',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            72 => 
            array (
                'id' => 73,
                'name' => 'Ajuste en Fondo de ahorro Exento',
                'identifier' => '029',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            73 => 
            array (
                'id' => 74,
                'name' => 'Ajuste en Caja de ahorro Exento',
                'identifier' => '030',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            74 => 
            array (
                'id' => 75,
                'name' => 'Ajuste en Contribuciones a Cargo del Trabajador Pagadas por el Patrón Exento',
                'identifier' => '031',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            75 => 
            array (
                'id' => 76,
                'name' => 'Ajuste en Premios por puntualidad Gravado',
                'identifier' => '032',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            76 => 
            array (
                'id' => 77,
                'name' => 'Ajuste en Prima de Seguro de vida Exento
',
                'identifier' => '033',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            77 => 
            array (
                'id' => 78,
                'name' => 'Ajuste en Seguro de Gastos Médicos Mayores Exento',
                'identifier' => '034',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            78 => 
            array (
                'id' => 79,
                'name' => 'Ajuste en Cuotas Sindicales Pagadas por el Patrón Exento',
                'identifier' => '035',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            79 => 
            array (
                'id' => 80,
                'name' => 'Ajuste en Subsidios por incapacidad Exento',
                'identifier' => '036',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            80 => 
            array (
                'id' => 81,
                'name' => 'Ajuste en Becas para trabajadores y/o hijos Exento',
                'identifier' => '037',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            81 => 
            array (
                'id' => 82,
                'name' => 'Ajuste en Horas extra Exento',
                'identifier' => '038',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            82 => 
            array (
                'id' => 83,
                'name' => 'Ajuste en Horas extra Gravado',
                'identifier' => '039',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            83 => 
            array (
                'id' => 84,
                'name' => 'Ajuste en Prima dominical Exento',
                'identifier' => '040',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            84 => 
            array (
                'id' => 85,
                'name' => 'Ajuste en Prima dominical Gravado',
                'identifier' => '041',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            85 => 
            array (
                'id' => 86,
                'name' => 'Ajuste en Prima vacacional Exento',
                'identifier' => '042',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            86 => 
            array (
                'id' => 87,
                'name' => 'Ajuste en Prima vacacional Gravado',
                'identifier' => '043',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            87 => 
            array (
                'id' => 88,
                'name' => 'Ajuste en Prima por antigüedad Exento',
                'identifier' => '044',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            88 => 
            array (
                'id' => 89,
                'name' => 'Ajuste en Prima por antigüedad Gravado',
                'identifier' => '045',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            89 => 
            array (
                'id' => 90,
                'name' => 'Ajuste en Pagos por separación Exento',
                'identifier' => '046',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            90 => 
            array (
                'id' => 91,
                'name' => 'Ajuste en Pagos por separación Gravado',
                'identifier' => '047',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            91 => 
            array (
                'id' => 92,
                'name' => 'Ajuste en Seguro de retiro Exento',
                'identifier' => '048',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            92 => 
            array (
                'id' => 93,
                'name' => 'Ajuste en Indemnizaciones Exento',
                'identifier' => '049',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            93 => 
            array (
                'id' => 94,
                'name' => 'Ajuste en Indemnizaciones Gravado',
                'identifier' => '050',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            94 => 
            array (
                'id' => 95,
                'name' => 'Ajuste en Reembolso por funeral Exento',
                'identifier' => '051',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            95 => 
            array (
                'id' => 96,
                'name' => 'Ajuste en Cuotas de seguridad social pagadas por el patrón Exento',
                'identifier' => '052',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            96 => 
            array (
                'id' => 97,
                'name' => 'Ajuste en Comisiones Gravado',
                'identifier' => '053',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            97 => 
            array (
                'id' => 98,
                'name' => 'Ajuste en Vales de despensa Exento',
                'identifier' => '054',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            98 => 
            array (
                'id' => 99,
                'name' => 'Ajuste en Vales de restaurante Exento',
                'identifier' => '055',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            99 => 
            array (
                'id' => 100,
                'name' => 'Ajuste en Vales de gasolina Exento',
                'identifier' => '056',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            100 => 
            array (
                'id' => 101,
                'name' => 'Ajuste en Vales de ropa Exento',
                'identifier' => '057',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            101 => 
            array (
                'id' => 102,
                'name' => 'Ajuste en Ayuda para renta Exento',
                'identifier' => '058',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            102 => 
            array (
                'id' => 103,
                'name' => 'Ajuste en ayuda para artículos escolares Exento',
                'identifier' => '059',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            103 => 
            array (
                'id' => 104,
                'name' => 'Ajuste en Ayuda para anteojos Exento',
                'identifier' => '060',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            104 => 
            array (
                'id' => 105,
                'name' => 'Ajuste en Ayuda para transporte Exento',
                'identifier' => '061',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            105 => 
            array (
                'id' => 106,
                'name' => 'Ajuste en Ayuda para gastos de funeral Exento',
                'identifier' => '062',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            106 => 
            array (
                'id' => 107,
                'name' => 'Ajuste en Otros ingresos por salarios Exento',
                'identifier' => '063',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            107 => 
            array (
                'id' => 108,
                'name' => 'Ajuste en Otros ingresos por salarios Gravado',
                'identifier' => '064',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            108 => 
            array (
                'id' => 109,
                'name' => 'Ajuste en Jubilaciones, pensiones o haberes de retiro en una sola exhibición Exento',
                'identifier' => '065',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            109 => 
            array (
                'id' => 110,
                'name' => 'Ajuste en Jubilaciones, pensiones o haberes de retiro en una sola exhibición Gravado',
                'identifier' => '066',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            110 => 
            array (
                'id' => 111,
                'name' => 'Ajuste en Pagos por separación Acumulable',
                'identifier' => '067',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            111 => 
            array (
                'id' => 112,
                'name' => 'Ajuste en Pagos por separación No acumulable',
                'identifier' => '068',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            112 => 
            array (
                'id' => 113,
                'name' => 'Ajuste en Jubilaciones, pensiones o haberes de retiro en parcialidades Exento',
                'identifier' => '069',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            113 => 
            array (
                'id' => 114,
                'name' => 'Ajuste en Jubilaciones, pensiones o haberes de retiro en parcialidades Gravado',
                'identifier' => '070',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            114 => 
            array (
                'id' => 115,
            'name' => 'Ajuste en Subsidio para el empleo (efectivamente entregado al trabajador)',
                'identifier' => '071',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            115 => 
            array (
                'id' => 116,
                'name' => 'Ajuste en Ingresos en acciones o títulos valor que representan bienes Exento',
                'identifier' => '072',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            116 => 
            array (
                'id' => 117,
                'name' => 'Ajuste en Ingresos en acciones o títulos valor que representan bienes Gravado',
                'identifier' => '073',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            117 => 
            array (
                'id' => 118,
                'name' => 'Ajuste en Alimentación Exento',
                'identifier' => '074',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            118 => 
            array (
                'id' => 119,
                'name' => 'Ajuste en Alimentación Gravado',
                'identifier' => '075',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            119 => 
            array (
                'id' => 120,
                'name' => 'Ajuste en Habitación Exento',
                'identifier' => '076',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            120 => 
            array (
                'id' => 121,
                'name' => 'Ajuste en Habitación Gravado',
                'identifier' => '077',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            121 => 
            array (
                'id' => 122,
                'name' => 'Ajuste en Premios por asistencia',
                'identifier' => '078',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            122 => 
            array (
                'id' => 123,
                'name' => 'Ajuste en Pagos distintos a los listados y que no deben considerarse como ingreso por sueldos, salarios o ingresos asimilados.',
                'identifier' => '079',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            123 => 
            array (
                'id' => 124,
                'name' => 'Ajuste en Viáticos gravados',
                'identifier' => '080',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            124 => 
            array (
                'id' => 125,
            'name' => 'Ajuste en Viáticos (entregados al trabajador)',
                'identifier' => '081',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            125 => 
            array (
                'id' => 126,
                'name' => 'Ajuste en Fondo de ahorro Gravado',
                'identifier' => '082',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            126 => 
            array (
                'id' => 127,
                'name' => 'Ajuste en Caja de ahorro Gravado',
                'identifier' => '083',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            127 => 
            array (
                'id' => 128,
                'name' => 'Ajuste en Prima de Seguro de vida Gravado',
                'identifier' => '084',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            128 => 
            array (
                'id' => 129,
                'name' => 'Ajuste en Seguro de Gastos Médicos Mayores Gravado',
                'identifier' => '085',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            129 => 
            array (
                'id' => 130,
                'name' => 'Ajuste en Subsidios por incapacidad Gravado',
                'identifier' => '086',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            130 => 
            array (
                'id' => 131,
                'name' => 'Ajuste en Becas para trabajadores y/o hijos Gravado',
                'identifier' => '087',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            131 => 
            array (
                'id' => 132,
                'name' => 'Ajuste en Seguro de retiro Gravado',
                'identifier' => '088',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            132 => 
            array (
                'id' => 133,
                'name' => 'Ajuste en Vales de despensa Gravado',
                'identifier' => '089',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            133 => 
            array (
                'id' => 134,
                'name' => 'Ajuste en Vales de restaurante Gravado',
                'identifier' => '090',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            134 => 
            array (
                'id' => 135,
                'name' => 'Ajuste en Vales de gasolina Gravado',
                'identifier' => '091',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            135 => 
            array (
                'id' => 136,
                'name' => 'Ajuste en Vales de ropa Gravado',
                'identifier' => '092',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            136 => 
            array (
                'id' => 137,
                'name' => 'Ajuste en Ayuda para renta Gravado',
                'identifier' => '093',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            137 => 
            array (
                'id' => 138,
                'name' => 'Ajuste en Ayuda para artículos escolares Gravado',
                'identifier' => '094',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            138 => 
            array (
                'id' => 139,
                'name' => 'Ajuste en Ayuda para anteojos Gravado',
                'identifier' => '095',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            139 => 
            array (
                'id' => 140,
                'name' => 'Ajuste en Ayuda para transporte Gravado',
                'identifier' => '096',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            140 => 
            array (
                'id' => 141,
                'name' => 'Ajuste en Ayuda para gastos de funeral Gravado',
                'identifier' => '097',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            141 => 
            array (
                'id' => 142,
                'name' => 'Ajuste a ingresos asimilados a salarios gravados',
                'identifier' => '098',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            142 => 
            array (
                'id' => 143,
                'name' => 'Ajuste a ingresos por sueldos y salarios gravados',
                'identifier' => '099',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            143 => 
            array (
                'id' => 144,
                'name' => 'Ajuste en Viáticos exentos',
                'identifier' => '100',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            144 => 
            array (
                'id' => 145,
                'name' => 'ISR Retenido de ejercicio anterior',
                'identifier' => '101',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            145 => 
            array (
                'id' => 146,
                'name' => 'Ajuste a pagos por gratificaciones, primas, compensaciones, recompensas u otros a extrabajadores derivados de jubilación en parcialidades, gravados',
                'identifier' => '102',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            146 => 
            array (
                'id' => 147,
                'name' => 'Ajuste a pagos que se realicen a extrabajadores que obtengan una jubilación en parcialidades derivados de la ejecución de una resolución judicial o de un laudo gravados',
                'identifier' => '103',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            147 => 
            array (
                'id' => 148,
                'name' => 'Ajuste a pagos que se realicen a extrabajadores que obtengan una jubilación en parcialidades derivados de la ejecución de una resolución judicial o de un laudo exentos',
                'identifier' => '104',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            148 => 
            array (
                'id' => 149,
                'name' => 'Ajuste a pagos que se realicen a extrabajadores que obtengan una jubilación en una sola exhibición derivados de la ejecución de una resolución judicial o de un laudo gravados',
                'identifier' => '105',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            149 => 
            array (
                'id' => 150,
                'name' => 'Ajuste a pagos que se realicen a extrabajadores que obtengan una jubilación en una sola exhibición derivados de la ejecución de una resolución judicial o de un laudo exentos',
                'identifier' => '106',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            150 => 
            array (
                'id' => 151,
                'name' => 'Ajuste al Subsidio Causado ',
                'identifier' => '107',
                'cat_concept_type_id' => 2,
                'isActive' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}