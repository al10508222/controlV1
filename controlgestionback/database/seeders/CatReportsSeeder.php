<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CatReportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('cat_reports')->insert([ 
            //=====================     Group 1 personalInformation ==========================
            ['key' =>'personalInformation.code', 'name' => 'Código de empleado', 'reports_section_id' =>1],
            ['key' =>'personalInformation.name', 'name' => 'Nombre', 'reports_section_id' => 1],
            ['key' =>'personalInformation.lastname', 'name' => 'Primer apellido', 'reports_section_id' => 1],
            ['key' =>'personalInformation.second_lastname', 'name' => 'Segundo apellido', 'reports_section_id' => 1],
            ['key' =>'personalInformation.rfc', 'name' => 'RFC', 'reports_section_id' => 1],
            ['key' =>'personalInformation.curp', 'name' => 'CURP', 'reports_section_id' => 1],
            ['key' =>'personalInformation.nss', 'name' => 'NSS', 'reports_section_id' => '1'],
            ['key' =>'personalInformation.cat_gender_id', 'name' => 'Género', 'reports_section_id' => 1],
            ['key' =>'personalInformation.cat_marital_status_id', 'name' => 'Estado Civil', 'reports_section_id' => 1],
            ['key' =>'personalInformation.cat_country_id', 'name' => 'País de nacimiento', 'reports_section_id' => 1],
            ['key' =>'personalInformation.cat_state_id', 'name' => 'Estado', 'reports_section_id' => 1],
            ['key' =>'personalInformation.birthdate', 'name' => 'Fecha de nacimiento', 'reports_section_id' => 1],
            ['key' =>'personalInformation.cat_educational_level_id', 'name' => 'Nivel de estudios', 'reports_section_id' => 1],

            ['key' =>'personalInformation.email', 'name' => 'Correo Electronico', 'reports_section_id' => 2],
            ['key' =>'personalInformation.telephone', 'name' => 'Teléfono', 'reports_section_id' => 2],
            ['key' =>'personalInformation.cellphone', 'name' => 'Movil', 'reports_section_id' => 2],

            ['key' =>'personalEmergency.contact_name', 'name' => 'Nombre', 'reports_section_id' => 3],
            ['key' =>'personalEmergency.contact_phone', 'name' => 'Numero de emergencia', 'reports_section_id' => 3],

                        //===================== Group 2 personalAdress ==========================

            ['key' =>'personalAdress.state', 'name' => 'Estado', 'reports_section_id' => 4],
            ['key' =>'personalAdress.town', 'name' => 'Municipio/Alcaldía', 'reports_section_id' => 4],
            ['key' =>'personalAdress.neighborhood', 'name' => 'Colonia', 'reports_section_id' => 4],
            ['key' =>'personalAdress.city', 'name' => 'Ciudad', 'reports_section_id' => 4],
            ['key' =>'personalAdress.zipcode', 'name' => 'CP', 'reports_section_id' => 4],
            ['key' =>'personalAdress.street', 'name' => 'Calle', 'reports_section_id' => 4],
            ['key' =>'personalAdress.ext_num', 'name' => 'Número exterior', 'reports_section_id' => 4],
            ['key' =>'personalAdress.int_num', 'name' => 'Número interior', 'reports_section_id' => 4],

                     //===================== Group 3 personalProfessionalExperience ==========================

            ['key' =>'personalExperience.company', 'name' => 'Empresa', 'reports_section_id' => 5],
            ['key' =>'personalExperience.position', 'name' => 'Cargo', 'reports_section_id' => 5],
            ['key' =>'personalExperience.start_date', 'name' => 'Fecha de inicio', 'reports_section_id' => 5],
            ['key' =>'personalExperience.end_date', 'name' => 'Fecha de finalización', 'reports_section_id' => 5],
            ['key' =>'personalExperience.description', 'name' => 'Descripción', 'reports_section_id' => 5],
            ['key' =>'personalExperience.achievements', 'name' => 'Logros', 'reports_section_id' => 5],

                     //===================== personalEducation ==========================

            ['key' =>'personalEducation.school', 'name' => 'Escuela', 'reports_section_id' => 6],
            ['key' =>'personalEducation.title', 'name' => 'Titulación', 'reports_section_id' => 6],
            ['key' =>'personalEducation.education_status', 'name' => 'Situación actual', 'reports_section_id' => 6],
            ['key' =>'personalEducation.start_date', 'name' => 'Fecha de inicio', 'reports_section_id' => 6],
            ['key' =>'personalEducation.end_date', 'name' => 'Fecha de finalización', 'reports_section_id' => 6],
            ['key' =>'personalEducation.description', 'name' => 'Descripción', 'reports_section_id' => 6],

                     //===================== personalCertifications ==========================

            ['key' =>'personalCertifications.entify', 'name' => 'Emisor', 'reports_section_id' => 7],
            ['key' =>'personalCertifications.name', 'name' => 'Nombre de la certificación', 'reports_section_id' => 7],
            ['key' =>'personalCertifications.description','name' => 'Descripción', 'reports_section_id' => 7],
            ['key' =>'personalCertifications.start_date', 'name' => 'Fecha de inicio', 'reports_section_id' => 7],
            ['key' =>'personalCertifications.end_date', 'name' => 'Fecha de finalización', 'reports_section_id' => 7],
            ['key' =>'personalCertifications.credential_id', 'name' => 'ID de la credencial', 'reports_section_id' => 7],
            ['key' =>'personalCertifications.url', 'name' => 'URL', 'reports_section_id' => 7],

                     //===================== personalSkills ==========================

            ['key' =>'personalSkills.skills', 'name' => 'Habilidades', 'reports_section_id' => 8],

                     //===================== Group 4 personalBank ==========================

            ['key' =>'personalBank.cat_bank_account_type', 'name' => 'Tipo de cuenta', 'reports_section_id' => 9],
            ['key' =>'personalBank.clabe', 'name' => 'Clabe', 'reports_section_id' => 9],
            ['key' =>'personalBank.cat_bank_id','name' => 'Banco', 'reports_section_id' => 9],

                     //===================== Group 5 personalLabor ==========================

            ['key' =>'personalLabor.cat_employment_type_id', 'name' => 'Tipo de movimiento', 'reports_section_id' => 10],
            ['key' =>'personalLabor.date', 'name' => 'Fecha de aplicación de movimiento', 'reports_section_id' => 10],
            ['key' =>'personalLabor.cat_contract_type_id','name' => 'Tipo de contratación', 'reports_section_id' => 10],
            ['key' =>'personalLabor.cat_unit_id','name' => 'Unidad administrativa', 'reports_section_id' => 10],
            ['key' =>'personalLabor.position_id','name' => 'Puesto', 'reports_section_id' => 10],
            ['key' =>'personalLabor.cat_employment_location_id','name' => 'Ubicación fisica', 'reports_section_id' => 10],
            ['key' =>'personalLabor.has_kit','name' => 'Kit de ingreso inicial', 'reports_section_id' => 10],

                     //===================== Group 6 personalPosition ==========================

            ['key' =>'personalPosition.name', 'name' => 'Nombre', 'reports_section_id' => 11],
            ['key' =>'personalPosition.cat_contract_type_id', 'name' => 'Contratación', 'reports_section_id' => 11],
            ['key' =>'personalPosition.cat_tabulator_id', 'name' => 'Tabulador', 'reports_section_id' => 11],
            ['key' =>'personalPosition.cat_unit_id', 'name' => 'Unidad', 'reports_section_id' => 11],
                     //===================== Group 7 personalPayroll ==========================

            ['key' =>'personalPayroll.code', 'name' => 'Folio', 'reports_section_id' => 12],
            ['key' =>'personalPayroll.cat_contract_type_id', 'name' => 'Tipo de contratación', 'reports_section_id' => 12],
            ['key' =>'personalPayroll.cat_periodicity_type_id', 'name' => 'Tipo de nómina', 'reports_section_id' => 12],
            ['key' =>'personalPayroll.period_days', 'name' => 'Dias del periodo', 'reports_section_id' => 12],
            ['key' =>'personalPayroll.value', 'name' => 'Dias por año', 'reports_section_id' => 12],
            ['key' =>'personalPayroll.payment_date', 'name' => 'Fecha de pago', 'reports_section_id' => 12],
            ['key' =>'personalPayroll.payment_period_start', 'name' => 'Fecha inicio periodo de pago', 'reports_section_id' => 12],
            ['key' =>'personalPayroll.payment_period_end', 'name' => 'Fecha fin periodo de pago', 'reports_section_id' => 12],

        ]);

    }
}
