<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Catalogs\Core\CatCoreExpression;



/** WARNING 
 * NOTA:  Agregar cualquier expresión nueva al final y 
 *        con el ID que le corresponda en la secuencia, ya que actualmente
 *        este seeder se utiliza para alimentar otro, modificar los ids 
 *        provocaría inconsistencia de datos.
 */


class CatCoreExpressionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ARITHMETIC_EXPRESSION = 1;
        $FUNCTION_EXPRESSION = 2;
        $FIELD_EXPRESSION = 3;
        $NUMERIC_EXPRESSION = 4;
        $CUSTOM_FIELD_EXPRESSION = 5;

        CatCoreExpression::create([
            'id'                          => 1,
            'name'                        =>'+',
            'description'                 => 'SUMA',
            'cat_core_expression_type_id' => $ARITHMETIC_EXPRESSION
        ]);
        CatCoreExpression::create([
            'id'                          => 2,
            'name'                        =>'-',
            'description'                 => 'RESTA',
            'cat_core_expression_type_id' => $ARITHMETIC_EXPRESSION
        ]);
        CatCoreExpression::create([
            'id'                          => 3,
            'name'                        =>'*',
            'description'                 => 'MULTIPLICACIÓN',
            'cat_core_expression_type_id' => $ARITHMETIC_EXPRESSION
        ]);
        CatCoreExpression::create([
            'id'                           => 4,
            'name'                        =>'/',
            'description'                 => 'DIVISIÓN',
            'cat_core_expression_type_id' => $ARITHMETIC_EXPRESSION
        ]);
        CatCoreExpression::create([
            'id'                           => 7,
            'name'                        =>'UMA',
            'description'                 => 'Unidad de Medida y Actualización',
            'cat_core_expression_type_id' => $FIELD_EXPRESSION
        ]);
        CatCoreExpression::create([
            'id'                           => 8,
            'name'                        =>'SD',
            'description'                 => 'Salario Diario',
            'cat_core_expression_type_id' => $FIELD_EXPRESSION
        ]);
        CatCoreExpression::create([
            'id'                           => 9,
            'name'                        => 'CG',
            'description'                 => 'Compensación Garantizada',
            'cat_core_expression_type_id' => $FIELD_EXPRESSION
        ]);
        CatCoreExpression::create([
            'id'                           => 10,
            'name'                         => 'SB',
            'description'                  => 'Sueldo Base',
            'cat_core_expression_type_id'  => $FIELD_EXPRESSION
        ]);
        CatCoreExpression::create([
            'id'                           => 11,
            'name'                        =>'SBC',
            'description'                 => 'Sueldo base de cotización',
            'cat_core_expression_type_id' => $FIELD_EXPRESSION
        ]);
        CatCoreExpression::create([
            'id'                           => 12,
            'name'                        =>'(',
            'description'                 => 'Paréntesis inicial, agrupador de funciones',
            'cat_core_expression_type_id' => $ARITHMETIC_EXPRESSION
        ]);
        CatCoreExpression::create([
            'id'                           => 13,
            'name'                        =>')',
            'description'                 => 'Paréntesis final, agrupador de funciones',
            'cat_core_expression_type_id' => $ARITHMETIC_EXPRESSION
        ]);
        CatCoreExpression::create([
            'id'                           => 14,
            'name'                        =>'0',
            'description'                 => 'CERO',
            'cat_core_expression_type_id' => $NUMERIC_EXPRESSION
        ]);
        CatCoreExpression::create([
            'id'                           => 15,
            'name'                        =>'1',
            'description'                 => 'UNO',
            'cat_core_expression_type_id' => $NUMERIC_EXPRESSION
        ]);
        CatCoreExpression::create([
            'id'                           => 16,
            'name'                        =>'2',
            'description'                 => 'DOS',
            'cat_core_expression_type_id' => $NUMERIC_EXPRESSION
        ]);
        CatCoreExpression::create([
            'id'                           => 17,
            'name'                        =>'3',
            'description'                 => 'TRES',
            'cat_core_expression_type_id' => $NUMERIC_EXPRESSION
        ]);
        CatCoreExpression::create([
            'id'                           => 18,
            'name'                        =>'4',
            'description'                 => 'CUATRO',
            'cat_core_expression_type_id' => $NUMERIC_EXPRESSION
        ]);
        CatCoreExpression::create([
            'id'                           => 19,
            'name'                        =>'5',
            'description'                 => 'CINCO',
            'cat_core_expression_type_id' => $NUMERIC_EXPRESSION
        ]);
        CatCoreExpression::create([
            'id'                           => 20,
            'name'                        =>'6',
            'description'                 => 'SEIS',
            'cat_core_expression_type_id' => $NUMERIC_EXPRESSION
        ]);
        CatCoreExpression::create([
            'id'                           => 21,
            'name'                        =>'7',
            'description'                 => 'SIETE',
            'cat_core_expression_type_id' => $NUMERIC_EXPRESSION
        ]);
        CatCoreExpression::create([
            'id'                           => 22,
            'name'                        =>'8',
            'description'                 => 'OCHO',
            'cat_core_expression_type_id' => $NUMERIC_EXPRESSION
        ]);
        CatCoreExpression::create([
            'id'                           => 23,
            'name'                        =>'9',
            'description'                 => 'NUEVE',
            'cat_core_expression_type_id' => $NUMERIC_EXPRESSION
        ]);
        CatCoreExpression::create([
            'id'                           => 24,
            'name'                        =>'.',
            'description'                 => 'PUNTO',
            'cat_core_expression_type_id' => $NUMERIC_EXPRESSION
        ]);
        CatCoreExpression::create([
            'id'                           => 25,
            'name'                        =>'DIAS_TRABAJADOS',
            'description'                 => 'DÍAS TRABAJADOS',
            'cat_core_expression_type_id' => $FUNCTION_EXPRESSION
        ]);
        CatCoreExpression::create([
            'id'                           => 26,
            'name'                         => 'IMSS',
            'description'                  => 'Instituto Méxicano del Seguro Social',
            'cat_core_expression_type_id'  => $FUNCTION_EXPRESSION
        ]);
        CatCoreExpression::create([
            'id'                           => 27,
            'name'                         => 'ISR',
            'description'                  => 'Impuesto sobre la Renta mensual',
            'cat_core_expression_type_id'  => $FUNCTION_EXPRESSION
        ]);
        CatCoreExpression::create([
            'id'                           => 28,
            'name'                         => 'TOTAL_PERCEPCIONES',
            'description'                  => 'Retorna el total de percepciones generadas en el proceso',
            'cat_core_expression_type_id'  => $FUNCTION_EXPRESSION
        ]);
        CatCoreExpression::create([
            'id'                           => 29,
            'name'                         => 'Infonavit',
            'description'                  => 'Cuota de crédito INFONAVIT',
            'cat_core_expression_type_id'  => $CUSTOM_FIELD_EXPRESSION,
        ]);

        CatCoreExpression::create([
            'id'                           => 30,
            'name'                        =>'DIAS_TRABAJADOS_AÑO',
            'description'                 => 'Días trabajados en el año',
            'cat_core_expression_type_id' => $FUNCTION_EXPRESSION
        ]);

        CatCoreExpression::create([
            'id'                           => 31,
            'name'                        =>'ISR_AGUINALDO',
            'description'                 => 'Parte proporcional al total gravable tomando en cuenta el ISR sobre base gravable mensual',
            'cat_core_expression_type_id' => $FUNCTION_EXPRESSION
        ]);

        CatCoreExpression::Create([
            'id' => 32,
            'name' => 'ISR_GRATIFICACIÓN_ANUAL',
            'description' => 'Parte proporcional al total gravable, tomando en cuenta el ISR de la Base Gravable Mensual y el Aguinaldo',
            'cat_core_expression_type_id' => $FUNCTION_EXPRESSION
        ]);

        CatCoreExpression::Create([
            'id' => 33,
            'name' => 'Tasa ISN',
            'description' => 'Valor de la tasa de ISN configurada en las variables anuales',
            'cat_core_expression_type_id' => $FIELD_EXPRESSION
        ]);

        CatCoreExpression::Create([
            'id' => 34,
            'name' => 'ISSSTE',
            'description' => 'Cálculo de aportaciones del Instituto de Seguridad y Servicios Sociales para los Trabajadores del Estado',
            'cat_core_expression_type_id' => $FIELD_EXPRESSION
        ]);

        \DB::statement('ALTER SEQUENCE public.cat_core_expressions_id_seq RESTART WITH 35');
    }
}
