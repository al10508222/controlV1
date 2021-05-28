<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Catalogs\CatModule;
class CatModulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CatModule::create([
            'id'       => 1,
            'name'     =>'Módulo Usuarios',
            'code'     =>'module_users'
        ]);
        CatModule::create([
            'id'       => 2,
            'name'     =>'Módulo roles',
            'code'     =>'module_roles'
        ]);
        CatModule::create([
            'id'       => 3,
            'name'     =>'Módulo catalogos',
            'code'     => 'module_admin'
        ]);
        CatModule::create([
            'id'       => 4,
            'name'     =>'Módulo Contratos',
            'code'     => 'module_contract'
        ]);
        CatModule::create([
            'id'       => 5,
            'name'     =>'Módulo Memo Contratacion',
            'code'     =>'module_hiring_memo'
        ]);
        CatModule::create([
            'id'       => 6,
            'name'     =>'Módulo Pagos',
            'code'     =>'module_payments'
        ]);
        CatModule::create([
            'id'       => 7,
            'name'     =>'Módulo Proyectos',
            'code'     =>'module_pajects'
        ]);
        CatModule::create([
            'id'       => 8,
            'name'     =>'Modulo Clientes',
            'code'     => 'module_clients'
        ]);
        CatModule::create([
            'id'       => 9,
            'name'     =>'Modulo Provedores',
            'code'     => 'module_providers'
        ]);
        CatModule::create([
            'id'       => 10,
            'name'     =>'Módulo Empleados',
            'code'     => 'module_employees'
        ]);
        CatModule::create([
            'id'       => 11,
            'name'     =>'Módulo de Prenómina',
            'code'     => 'module_payroll'
        ]);
        CatModule::create([
            'id'       => 12,
            'name'     =>'Módulo de conceptos',
            'code'     => 'module_concepts'
        ]);
        CatModule::create([
            'id'       => 13,
            'name'     => 'Módulo de ISR',
            'code'     => 'module_isr'
        ]);
        CatModule::create([
            'id'       => 14,
            'name'     =>'Modulo de subsidio para el empleo',
            'code'     => 'module_subsidies'
        ]);
        CatModule::create([
            'id'       => 15,
            'name'     =>'Módulo de IMSS',
            'code'     => 'module_imss'
        ]);
        CatModule::create([
            'id'       => 16,
            'name'     =>'Campos personalizados',
            'code'     => 'module_customField'
        ]);
        CatModule::create([
            'id'       => 17,
            'name'     =>'Modulo de calendario',
            'code'     => 'module_calendar'
        ]);
        CatModule::create([
            'id'       => 18,
            'name'     =>'Módulo de Puestos',
            'code'     => 'module_postions'
        ]);
        CatModule::create([
            'id'       => 19,
            'name'     =>'Modulos generales',
            'code'     => 'module_general'
        ]);
        CatModule::create([
            'id'       => 20,
            'name'     =>'Sistema de Prestadores de Servicio',
            'code'     => 'system_providers'
        ]);
        CatModule::create([
            'id'       => 21,
            'name'     =>'Modulo de reportes',
            'code'     => 'module-report'
        ]);
        CatModule::create([
            'id'       => 22,
            'name'     =>'Modulo de ISSSTE',
            'code'     => 'module_issste'
        ]);
        CatModule::create([
            'id'       => 23,
            'name'     =>'Modulo de Vacaciones',
            'code'     => 'module_vacations'
        ]);
        CatModule::create([
            'id'       => 24,
            'name'     => 'Módulo de Personas',
            'code'     => 'module_persons'
        ]);
        CatModule::create([
            'id'       => 25,
            'name'     => 'Módulo de Movimientos de Personal',
            'code'     => 'module_movements'
        ]);
        CatModule::create([
            'id'       => 26,
            'name'     => 'Módulo de Vacaciones de Ley',
            'code'     => 'module_law_vacations'
        ]);
        CatModule::create([
            'id'       => 27,
            'name'     =>'Módulo de Incidencias',
            'code'     => 'module_incidents'
        ]);
        CatModule::create([
            'id'       => 28,
            'name'     => 'Módulo de Primas quinquenales',
            'code'     => 'module_five_year_bonus'
        ]);
        CatModule::create([
            'id'       => 29,
            'name'     => 'Módulo de Tipos de Vacaciones',
            'code'     => 'module_vacation_types'
        ]);
        CatModule::create([
            'id'       => 30,
            'name'     => 'Módulo de ajustes del sistema',
            'code'     => 'module_settings'
        ]);
        CatModule::create([
            'id'       => 31,
            'name'     => 'Módulo de Horarios',
            'code'     => 'module_schedules'
        ]);
        CatModule::create([
            'id'       => 32,
            'name'     => 'Módulo Catálogo CuCop',
            'code'     => 'module_cucop'
        ]);
    }
}
