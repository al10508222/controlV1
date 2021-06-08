<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CatPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('cat_permissions')->insert([
            //===================== USER (admin) ==========================
            ['key' =>'users-view', 'name' => 'Ver Usuarios', 'description' => 'Acceso a listado y detalle de usuarios Ver Usuarios (Todos los tipos)', 'module_id' => '1'],
            ['key' =>'users-create', 'name' => 'Crear Usuarios', 'description' => 'Creación de usuarios Ver Usuarios (Todos los tipos)', 'module_id' => '1'],
            ['key' =>'users-edit', 'name' => 'Editar Usuarios', 'description' => 'Edición de usuarios Ver Usuarios (Todos los tipos)', 'module_id' => '1'],
            ['key' =>'users-delete', 'name' => 'Eliminar Usuarios', 'description' => 'Eliminación de usuarios Ver Usuarios (Todos los tipos)', 'module_id' => '1'],
            ['key' =>'users-destroy', 'name' => 'Destruir Usuarios', 'description' => 'Eliminación permanente de usuarios Ver Usuarios (Todos los tipos) y todas sus relaciones', 'module_id' => '1'],

            //===================== ROLES (user profile) ==========================
            ['key' =>'roles-view', 'name' => 'Ver Roles', 'description' => 'Acceso a listado y detalle de roles', 'module_id' => '2'],
            ['key' =>'roles-create', 'name' => 'Crear Roles', 'description' => 'Creación de roles', 'module_id' => '2'],
            ['key' =>'roles-edit', 'name' => 'Editar Roles', 'description' => 'Edición de roles', 'module_id' => '2'],
            ['key' =>'roles-delete', 'name' => 'Eliminar Roles', 'description' => 'Eliminación de roles', 'module_id' => '2'],
            ['key' =>'roles-destroy', 'name' => 'Destruir Roles', 'description' => 'Eliminación permanente de roles y todas sus relaciones', 'module_id' => '2'],

            //===================== CATALOGS ==========================
            ['key' =>'catalogs-view', 'name' => 'Ver catálogos', 'description' => 'Acceso a listado de catálogos', 'module_id' => '3'],
            ['key' =>'catalogs-create', 'name' => 'Crear catálogos', 'description' => 'Creación de catálogos', 'module_id' => '3'],
            ['key' =>'catalogs-edit', 'name' => 'Editar catálogos', 'description' => 'Edición de catálogos', 'module_id' => '3'],
            ['key' =>'catalogs-delete', 'name' => 'Eliminar catálogos', 'description' => 'Eliminación de catálogos', 'module_id' => '3'],
            ['key' =>'catalogs-destroy', 'name' => 'Destruir catálogos', 'description' => 'Eliminación permanente de catálogos y todas sus relaciones', 'module_id' => '3'],

            //===================== CONTRACTS ==========================
            ['key' =>'contracts-view', 'name' => 'Ver contratos', 'description' => 'Acceso a listado de contratos', 'module_id' => '4'],
            ['key' =>'contracts-create', 'name' => 'Crear contratos', 'description' => 'Creación de contratos', 'module_id' => '4'],
            ['key' =>'contracts-edit', 'name' => 'Editar contratos', 'description' => 'Edición de contratos', 'module_id' => '4'],
            ['key' =>'contracts-delete', 'name' => 'Eliminar contratos', 'description' => 'Eliminación de contratos', 'module_id' => '4'],
            ['key' =>'contracts-destroy', 'name' => 'Destruir contratos', 'description' => 'Eliminación permanente de contratos y todas sus relaciones', 'module_id' => '4'],
            ['key' =>'contracts-missive-load', 'name' => 'Carga masiva de contratos', 'description' => 'Carga masiva de contratos', 'module_id' => '4'],

            //===================== MEMOS DE CONTRATACIÓN ==========================
            ['key' =>'memo-view', 'name' => 'Ver memos de contratación', 'description' => 'Acceso a listado de contratos', 'module_id' => '5'],
            ['key' =>'memo-create', 'name' => 'Crear memos de contratación', 'description' => 'Creación de memos de contratación', 'module_id' => '5'],
            ['key' =>'memo-edit', 'name' => 'Editar memos de contratación', 'description' => 'Edición de memos de contratación', 'module_id' => '5'],
            ['key' =>'memo-delete', 'name' => 'Eliminar memos de contratación', 'description' => 'Eliminación de memos de contratación', 'module_id' => '5'],
            ['key' =>'memo-destroy', 'name' => 'Destruir memos de contratación', 'description' => 'Eliminación permanente de memos de contratación y todas sus relaciones', 'module_id' => '5'],

            //===================== PAYMENTS ==========================
            ['key' =>'payments-view',    'name' => 'Ver pagos',      'description' => 'Acceso a listado de pagos', 'module_id' => '6'],
            ['key' =>'payments-create',  'name' => 'Crear pagos',    'description' => 'Creación de pagos', 'module_id' => '6'],
            ['key' =>'payments-edit',    'name' => 'Editar pagos',   'description' => 'Edición de pagos', 'module_id' => '6'],
            ['key' =>'payments-delete',  'name' => 'Eliminar pagos', 'description' => 'Eliminación de pagos', 'module_id' => '6'],
            ['key' =>'payments-destroy', 'name' => 'Destruir pagos', 'description' => 'Eliminación permanente de pagos y todas sus relaciones', 'module_id' => '6'],

            //===================== PROJECTS ==========================
            ['key' =>'projects-view',    'name' => 'Ver projectos',      'description' => 'Acceso a listado de projectos', 'module_id' => '7'],
            ['key' =>'projects-create',  'name' => 'Crear projectos',    'description' => 'Creación de projectos', 'module_id' => '7'],
            ['key' =>'projects-edit',    'name' => 'Editar projectos',   'description' => 'Edición de projectos', 'module_id' => '7'],
            ['key' =>'projects-delete',  'name' => 'Eliminar projectos', 'description' => 'Eliminación de projectos', 'module_id' => '7'],
            ['key' =>'projects-destroy', 'name' => 'Destruir projectos', 'description' => 'Eliminación permanente de projectos y todas sus relaciones', 'module_id' => '7'],

            //===================== CLIENTS ==========================
            ['key' =>'clients-view',    'name' => 'Ver clientes',      'description' => 'Acceso a listado de clientes', 'module_id' => '8'],
            ['key' =>'clients-create',  'name' => 'Crear clientes',    'description' => 'Creación de clientes', 'module_id' => '8'],
            ['key' =>'clients-edit',    'name' => 'Editar clientes',   'description' => 'Edición de clientes', 'module_id' => '8'],
            ['key' =>'clients-delete',  'name' => 'Eliminar clientes', 'description' => 'Eliminación de clientes', 'module_id' => '8'],
            ['key' =>'clients-destroy', 'name' => 'Destruir clientes', 'description' => 'Eliminación permanente de clientes y todas sus relaciones', 'module_id' => '8'],

            //===================== PROVIDERS ==========================
            ['key' =>'providers-view',         'name' => 'Ver alta de provedores',      'description' => 'Acceso a listado de alta de provedores', 'module_id' => '9'],
            ['key' =>'providers-create',       'name' => 'Crear alta de provedores',    'description' => 'Creación de alta de provedores', 'module_id' => '9'],
            ['key' =>'providers-edit',         'name' => 'Editar alta de provedores',   'description' => 'Edición de alta de provedores', 'module_id' => '9'],
            ['key' =>'providers-delete',       'name' => 'Eliminar alta de provedores', 'description' => 'Eliminación de alta de provedores', 'module_id' => '9'],
            ['key' =>'providers-destroy',      'name' => 'Destruir alta de provedores', 'description' => 'Eliminación permanente de alta de provedores y todas sus relaciones', 'module_id' => '9'],
            ['key' =>'providers-massive-load', 'name' => 'Carga masiva de contratos',   'description' => 'Carga masiva de contratos', 'module_id' => '9'],

            //===================== EMPLOYEE ==========================
            ['key' =>'employee-view',         'name' => 'Ver alta de empleados',      'description' => 'Acceso a listado de alta de empleados', 'module_id' => '10'],
            ['key' =>'employee-create',       'name' => 'Crear alta de empleados',    'description' => 'Creación de alta de empleados', 'module_id' => '10'],
            ['key' =>'employee-edit',         'name' => 'Editar alta de empleados',   'description' => 'Edición de alta de empleados', 'module_id' => '10'],
            ['key' =>'employee-delete',       'name' => 'Eliminar alta de empleados', 'description' => 'Eliminación de alta de empleados', 'module_id' => '10'],
            ['key' =>'employee-destroy',      'name' => 'Destruir alta de empleados', 'description' => 'Eliminación permanente de alta de empleados y todas sus relaciones', 'module_id' => '10'],
            ['key' =>'employee-massive-load', 'name' => 'Carga masiva de empleados',   'description' => 'Carga masiva de empleados', 'module_id' => '10'],

            //===================== PAYROLL ==========================
            ['key' =>'payroll-view',         'name' => 'Ver alta de prenomina',      'description' => 'Acceso a listado de alta de prenomina', 'module_id' => '11'],
            ['key' =>'payroll-create',       'name' => 'Crear alta de prenomina',    'description' => 'Creación de alta de prenomina', 'module_id' => '11'],
            ['key' =>'payroll-edit',         'name' => 'Editar alta de prenomina',   'description' => 'Edición de alta de prenomina', 'module_id' => '11'],
            ['key' =>'payroll-delete',       'name' => 'Eliminar alta de prenomina', 'description' => 'Eliminación de alta de prenomina', 'module_id' => '11'],
            ['key' =>'payroll-layout',       'name' => 'Generar layout de pago', 'description' => 'Generación de layout de pago', 'module_id' => '11'],
            ['key' =>'payroll-send-payment', 'name' => 'Enviar a pago',              'description' => 'Enviar a pago de la prenomina',  'module_id' => '11'],

            //===================== CONCEPTS ==========================
            ['key' =>'concepts-view',         'name' => 'Ver alta de conceptos',      'description' => 'Acceso a listado de alta de conceptos', 'module_id' => '12'],
            ['key' =>'concepts-create',       'name' => 'Crear alta de conceptos',    'description' => 'Creación de alta de conceptos', 'module_id' => '12'],
            ['key' =>'concepts-edit',         'name' => 'Editar alta de conceptos',   'description' => 'Edición de alta de conceptos', 'module_id' => '12'],
            ['key' =>'concepts-delete',       'name' => 'Eliminar alta de conceptos', 'description' => 'Eliminación de alta de conceptos', 'module_id' => '12'],
            ['key' =>'concepts-destroy',      'name' => 'Destruir alta de conceptos', 'description' => 'Eliminación permanente de alta de conceptos y todas sus relaciones', 'module_id' => '12'],

            //===================== ISR ===============================
            ['key' =>'isr-view',         'name' => 'Ver alta de ISR',      'description' => 'Acceso a listado de alta de ISR', 'module_id' => '13'],
            ['key' =>'isr-create',       'name' => 'Crear alta de ISR',    'description' => 'Creación de alta de ISR', 'module_id' => '13'],
            ['key' =>'isr-edit',         'name' => 'Editar alta de ISR',   'description' => 'Edición de alta de ISR', 'module_id' => '13'],
            ['key' =>'isr-delete',       'name' => 'Eliminar alta de ISR', 'description' => 'Eliminación de alta de ISR', 'module_id' => '13'],
            ['key' =>'isr-destroy',      'name' => 'Destruir alta de ISR', 'description' => 'Eliminación permanente de alta de ISR y todas sus relaciones', 'module_id' => '13'],

            //===================== Subsidies ===============================
            ['key' =>'subsidies-view',         'name' => 'Ver alta de subsidio para el empleo',      'description' => 'Acceso a listado de alta de subsidio para el empleo', 'module_id' => '14'],
            ['key' =>'subsidies-create',       'name' => 'Crear alta de subsidio para el empleo',    'description' => 'Creación de alta de subsidio para el empleo', 'module_id' => '14'],
            ['key' =>'subsidies-edit',         'name' => 'Editar alta de subsidio para el empleo',   'description' => 'Edición de alta de subsidio para el empleo', 'module_id' => '14'],
            ['key' =>'subsidies-delete',       'name' => 'Eliminar alta de subsidio para el empleo', 'description' => 'Eliminación de alta de subsidio para el empleo', 'module_id' => '14'],
            ['key' =>'subsidies-destroy',      'name' => 'Destruir alta de subsidio para el empleo', 'description' => 'Eliminación permanente de alta de subsidio para el empleo y todas sus relaciones', 'module_id' => '14'],

            //===================== IMSS ===============================
            ['key' =>'imss-view',         'name' => 'Ver alta de IMSS',      'description' => 'Acceso a listado de alta de IMSS', 'module_id' => '15'],
            ['key' =>'imss-create',       'name' => 'Crear alta de IMSS',    'description' => 'Creación de alta de IMSS', 'module_id' => '15'],
            ['key' =>'imss-edit',         'name' => 'Editar alta de IMSS',   'description' => 'Edición de alta de IMSS', 'module_id' => '15'],
            ['key' =>'imss-delete',       'name' => 'Eliminar alta de IMSS', 'description' => 'Eliminación de alta de IMSS', 'module_id' => '15'],
            ['key' =>'imss-destroy',      'name' => 'Destruir alta de IMSS', 'description' => 'Eliminación permanente de alta de IMSS y todas sus relaciones', 'module_id' => '15'],

            //===================== ISSSTE ===============================
            ['key' =>'issste-view',         'name' => 'Ver alta de ISSSTE',      'description' => 'Acceso a listado de alta de IMSS', 'module_id' => '22'],
            ['key' =>'issste-create',       'name' => 'Crear alta de ISSSTE',    'description' => 'Creación de alta de IMSS', 'module_id' => '22'],
            ['key' =>'issste-edit',         'name' => 'Editar alta de ISSSTE',   'description' => 'Edición de alta de IMSS', 'module_id' => '22'],
            ['key' =>'issste-delete',       'name' => 'Eliminar alta de ISSSTE', 'description' => 'Eliminación de alta de IMSS', 'module_id' => '22'],
            ['key' =>'issste-destroy',      'name' => 'Destruir alta de ISSSTE', 'description' => 'Eliminación permanente de alta de IMSS y todas sus relaciones', 'module_id' => '22'],

            //===================== PSP review ===============================
            ['key' =>'pspReview-view',         'name' => 'Ver módulo de revisión de psp',      'description' => 'Acceso a listado de revisión de psp', 'module_id' => '9'],
            ['key' =>'pspReview-validate',     'name' => 'Validar módulo de revisión de psp',   'description' => 'Validación de revisión de psp',      'module_id' => '9'],

            //===================== PSP Payment Cancel ===============================
            ['key' =>'pspPaymentCancel-view',         'name' => 'Ver módulo de cancelación de pagos de psp',      'description' => 'Acceso a listado de cancelación de pagos', 'module_id' => '9'],

            //===================== PSP Payment Consult ===============================
            ['key' =>'pspPaymentConsult-view',         'name' => 'Ver módulo de consulta de pagos de psp',      'description' => 'Acceso a listado de consulta de pagos', 'module_id' => '9'],

            //===================== AP review ===============================
            ['key' =>'pspApReview-view',         'name' => 'Ver módulo de revisión de AP para los psp',      'description' => 'Acceso a listado de revisión de AP', 'module_id' => '9'],
            ['key' =>'pspApReview-validate',     'name' => 'Validar módulo de revisión de AP',   'description' => 'Validación de revisión de AP',      'module_id' => '9'],

            //===================== Binnacle PSP ===============================
            ['key' =>'pspBinnacle-view',  'name' => 'Ver bitácora de movimientos de PSP ',    'description' => 'Acceso a listado de la bitácora de movimeintos de PSP', 'module_id' => '9'],

            //===================== Custom Fields ===============================
            ['key' =>'customField-view',         'name' => 'Ver alta de campos personalizados',      'description' => 'Acceso a listado de alta de campos personalizados', 'module_id' => '16'],
            ['key' =>'customField-create',       'name' => 'Crear alta de campos personalizados',    'description' => 'Creación de alta de campos personalizados', 'module_id' => '16'],
            ['key' =>'customField-edit',         'name' => 'Editar alta de campos personalizados',   'description' => 'Edición de alta de campos personalizados', 'module_id' => '16'],
            ['key' =>'customField-delete',       'name' => 'Eliminar alta de campos personalizados', 'description' => 'Eliminación de alta de campos personalizados', 'module_id' => '16'],
            ['key' =>'customField-destroy',      'name' => 'Destruir alta de campos personalizados', 'description' => 'Eliminación permanente de alta de campos personalizados y todas sus relaciones', 'module_id' => '16'],

            //===================== Calendar ===============================
            ['key' =>'calendar-view',  'name' => 'Ver calendario ',    'description' => 'Acceso al calendario', 'module_id' => '17'],
            ['key' =>'calendar-create', 'name'=> 'Crear calendario',   'description' =>'Agregar fecha de pago', 'module_id' => '17'],
            //===================== Positions ===============================
            ['key' =>'positions-view',         'name' => 'Ver alta de puestos',      'description' => 'Acceso a listado de alta de puestos', 'module_id' => '18'],
            ['key' =>'positions-create',       'name' => 'Crear alta de puestos',    'description' => 'Creación de alta de puestos', 'module_id' => '18'],
            ['key' =>'positions-edit',         'name' => 'Editar alta de puestos',   'description' => 'Edición de alta de puestos', 'module_id' => '18'],
            ['key' =>'positions-delete',       'name' => 'Eliminar alta de puestos', 'description' => 'Eliminación de alta de puestos', 'module_id' => '18'],
            ['key' =>'positions-destroy',      'name' => 'Destruir alta de puestos', 'description' => 'Eliminación permanente de alta de puestos y todas sus relaciones', 'module_id' => '18'],

            //===================== Dashboard ===============================
            ['key' =>'dashboard-view',  'name' => 'Ver dashboard ',    'description' => 'Visualización de dashboard', 'module_id' => '19'],

            //===================== Reports ==========================
            ['key' =>'reports-view', 'name' => 'Generar reportes', 'description' => 'Generar Reportes', 'module_id' => '21'],
            ['key' =>'reports-view-saved', 'name' => 'Descargar reportes guardados', 'description' => 'Reportes Guardados', 'module_id' => '21'],

            //===================== Vacations ===============================
            ['key' =>'vacations-view',    'name' => 'Ver alta de vacaciones',      'description' => 'Acceso a listado de alta de vacaciones', 'module_id' => '23'],
            ['key' =>'vacations-create',  'name' => 'Crear alta de vacaciones',    'description' => 'Creación de alta de vacaciones', 'module_id' => '23'],
            ['key' =>'vacations-edit',    'name' => 'Editar alta de vacaciones',   'description' => 'Edición de alta de vacaciones', 'module_id' => '23'],
            ['key' =>'vacations-delete',  'name' => 'Eliminar alta de vacaciones', 'description' => 'Eliminación de alta de vacaciones', 'module_id' => '23'],
            ['key' =>'vacations-destroy', 'name' => 'Destruir alta de vacaciones', 'description' => 'Eliminación permanente de alta de vacaciones y todas sus relaciones', 'module_id' => '23'],

            //===================== Person PSP ===============================
            ['key' =>'pspPerson-view',  'name' => 'Ver bitácora de movimientos de PSP ',    'description' => 'Acceso a módulo de personas de PSP', 'module_id' => '24'],
            ['key' =>'pspPerson-view-view',  'name' => 'Ver módulo de personas de PSP ',    'description' => 'Acceso a módulo de personas de PSP', 'module_id' => '24'],

            //===================== Movements ===============================
            ['key' => 'movements-view',         'name' => 'Ver movimientos',      'description' => 'Acceso a listado de movimientos', 'module_id' => '25'],
            ['key' => 'movements-create',       'name' => 'Crear movimientos',    'description' => 'Creación de movimientos', 'module_id' => '25'],
            ['key' => 'movements-edit',         'name' => 'Editar movimientos',   'description' => 'Edición de movimientos', 'module_id' => '25'],
            ['key' => 'movements-delete',       'name' => 'Eliminar movimientos', 'description' => 'Eliminación de movientos', 'module_id' => '25'],
            //===================== Law ===============================
            ['key' => 'law-vacations-view',         'name' => 'Ver Vacaciones de Ley',      'description' => 'Acceso a listado de Vacaciones de Ley', 'module_id' => '26'],
            ['key' => 'law-vacations-create',       'name' => 'Crear Vacaciones de Ley',    'description' => 'Creación de Vacaciones de Ley', 'module_id' => '26'],
            ['key' => 'law-vacations-edit',         'name' => 'Editar Vacaciones de Ley',   'description' => 'Edición de Vacaciones de Ley', 'module_id' => '26'],
            ['key' => 'law-vacations-delete',       'name' => 'Eliminar Vacaciones de Ley', 'description' => 'Eliminación de Vacaciones de Ley', 'module_id' => '26'],

            //===================== Incidents ===============================
            ['key' => 'incidents-view',         'name' => 'Ver Incidencias',          'description' => 'Acceso a módulo de Incidencias', 'module_id' => '27'],
            ['key' => 'incidents-create',       'name' => 'Crear incidencias',        'description' => 'Crear incidencias',              'module_id' => '27'],
            ['key' => 'incidents-edit',         'name' => 'Editar Incidencias',       'description' => 'Editar incidencias',             'module_id' => '27'],
            ['key' => 'incidents-delete',       'name' => 'Eliminar Incidencias',     'description' => 'Eliminar incidencias',           'module_id' => '27'],
            ['key' => 'incidents-massive-load', 'name' => 'Carga Masiva Incidencias', 'description' => 'Carga masiva de incidencias',    'module_id' => '27'],
            //===================== Five Year Bonus ===============================
            ['key' => 'five-year-bonus-view',         'name' => 'Ver Primas quinquenales',      'description' => 'Acceso a listado de Primas quinquenales', 'module_id' => '28'],
            ['key' => 'five-year-bonus-create',       'name' => 'Crear Primas quinquenales',    'description' => 'Creación de Primas quinquenales', 'module_id' => '28'],
            ['key' => 'five-year-bonus-edit',         'name' => 'Editar Primas quinquenales',   'description' => 'Edición de Primas quinquenales', 'module_id' => '28'],
            ['key' => 'five-year-bonus-delete',       'name' => 'Eliminar Primas quinquenales', 'description' => 'Eliminación de Primas quinquenales', 'module_id' => '28'],
            //===================== Vacation Types ===============================
            ['key' => 'vacation-types-view',   'name' => 'Ver Tipos de Vacaciones',      'description' => 'Acceso a listado de Tipo de Vacaciones', 'module_id' => '29'],
            ['key' => 'vacation-types-create', 'name' => 'Crear Tipos de Vacaciones',    'description' => 'Creación de Tipos de Vacaciones', 'module_id' => '29'],
            ['key' => 'vacation-types-edit',   'name' => 'Editar Tipos de Vacaciones',   'description' => 'Edición de Tipos de Vacaciones', 'module_id' => '29'],
            ['key' => 'vacation-types-delete', 'name' => 'Eliminar Tipos de Vacaciones', 'description' => 'Eliminación de Tipos de Vacaciones', 'module_id' => '29'],
            //====================== System Settings ===============================
            ['key' => 'settings-view',    'name' => 'Ver ajustes',       'description' => 'colores del sistema',  'module_id' => '30'],
            ['key' => 'settings-create',  'name' => 'Crear ajustes',     'description' => 'colores del sistema',  'module_id' => '30'],
            ['key' => 'settings-edit',    'name' => 'Editar ajustes',    'description' => 'Edición de colores del sistema',  'module_id' => '30'],
            ['key' => 'settings-delete',  'name' => 'Eliminar ajustes',  'description' => 'colores del sistema',  'module_id' => '30'],
            //====================== Schedules =====================================
            ['key' => 'schedules-view',   'name' => 'Ver horarios',      'description' => 'Acceso al listado de horarios', 'module_id' => '31'],
            ['key' => 'schedules-create', 'name' => 'Crear horarios',    'description' => 'Creación de horarios',          'module_id' => '31'],
            ['key' => 'schedules-edit',   'name' => 'Edita horarios',    'description' => 'Edición de horarios',           'module_id' => '31'],
            ['key' => 'schedules-delete', 'name' => 'Eliminar horarios', 'description' => 'Eliminación de horarios',       'module_id' => '31'],
            //====================== Catálogo CuCop =====================================
            ['key' => 'cucop-view',   'name' => 'Ver Catálogo Cucop',      'description' => 'Acceso al listado de Catálogo Cucop', 'module_id' => '32'],
            ['key' => 'cucop-create', 'name' => 'Crear Catálogo Cucop',    'description' => 'Creación de Catálogo Cucop',          'module_id' => '32'],
            ['key' => 'cucop-edit',   'name' => 'Edita Catálogo Cucop',    'description' => 'Edición de Catálogo Cucop',           'module_id' => '32'],
            ['key' => 'cucop-delete', 'name' => 'Eliminar Catálogo Cucop', 'description' => 'Eliminación de Catálogo Cucop',       'module_id' => '32'],
            //====================== Catálogo CLUES =====================================
            ['key' => 'clues-view',   'name' => 'Ver Catálogo Clues',      'description' => 'Acceso al listado de Catálogo Clues', 'module_id' => '33'],
            ['key' => 'clues-create', 'name' => 'Crear Catálogo Clues',    'description' => 'Creación de Catálogo Clues',          'module_id' => '33'],
            ['key' => 'clues-edit',   'name' => 'Edita Catálogo Clues',    'description' => 'Edición de Catálogo Clues',           'module_id' => '33'],
            ['key' => 'clues-delete', 'name' => 'Eliminar Catálogo Clues', 'description' => 'Eliminación de Catálogo Clues',       'module_id' => '33'],
            //====================== Catálogo Vialidades =====================================
            ['key' => 'vialidades-view',   'name' => 'Ver Catálogo Vialidades',      'description' => 'Acceso al listado de Catálogo Vialidades', 'module_id' => '34'],
            ['key' => 'vialidades-create', 'name' => 'Crear Catálogo Vialidades',    'description' => 'Creación de Catálogo Vialidades',          'module_id' => '34'],
            ['key' => 'vialidades-edit',   'name' => 'Edita Catálogo Vialidades',    'description' => 'Edición de Catálogo Vialidades',           'module_id' => '34'],
            ['key' => 'vialidades-delete', 'name' => 'Eliminar Catálogo Vialidades', 'description' => 'Eliminación de Catálogo Vialidades',       'module_id' => '34'],
        ]);

    }
}
