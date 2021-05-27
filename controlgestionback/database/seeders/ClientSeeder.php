<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = new Client();
        $client->acronym = 'GENERAL';
        $client->name = 'GENERAL';
        $client->save();

        $client = new Client();
        $client->acronym = 'COMISIÓN EJECUTIVA DE ATENCIÓN A VÍCTIMAS';
        $client->name = 'COMISIÓN EJECUTIVA DE ATENCIÓN A VÍCTIMAS';
        $client->save();


        $client = new Client();
        $client->acronym = 'FINANCIERA NACIONAL DE DESARROLLO AGROPECUARIO, RURAL, FORESTAL Y PESQUERO';
        $client->name = 'FINANCIERA NACIONAL DE DESARROLLO AGROPECUARIO, RURAL, FORESTAL Y PESQUERO';
        $client->save();


        $client = new Client();
        $client->acronym = 'SERVICIOS DE HOSPEDAJE, ADMINISTRACIÓN Y SOPORTE DE LA OPERACIÓN DE LA INFRAESTRUCTURA DE CÓMPUTO DE LA SECRETARÍA DE HACIENDA Y CRÉDITO PÚBLICO';
        $client->name = 'SERVICIOS DE HOSPEDAJE, ADMINISTRACIÓN Y SOPORTE DE LA OPERACIÓN DE LA INFRAESTRUCTURA DE CÓMPUTO DE LA SECRETARÍA DE HACIENDA Y CRÉDITO PÚBLICO';
        $client->save();


        $client = new Client();
        $client->acronym = 'INSTITUTO PARA LA PROTECCIÓN AL AHORRO BANCARIO';
        $client->name = 'INSTITUTO PARA LA PROTECCIÓN AL AHORRO BANCARIO';
        $client->save();

        $client = new Client();
        $client->acronym = 'AUDITORÍA SUPERIOR DE LA FEDERACIÓN';
        $client->name = 'AUDITORÍA SUPERIOR DE LA FEDERACIÓN';
        $client->save();

        $client = new Client();
        $client->acronym = 'INSTITUTO NACIONAL DE CIENCIAS PENALES';
        $client->name = 'INSTITUTO NACIONAL DE CIENCIAS PENALES';
        $client->save();
        
        $client = new Client();
        $client->acronym = 'SERVICIO NACIONAL DE SANIDAD, INOCUIDAD Y CALIDAD AGROALIMENTARIA';
        $client->name = 'SERVICIO NACIONAL DE SANIDAD, INOCUIDAD Y CALIDAD AGROALIMENTARIA';
        $client->save();

        $client = new Client();
        $client->acronym = 'SECRETARÍA DE COMUNICACIONES Y TRANSPORTES';
        $client->name = 'SECRETARÍA DE COMUNICACIONES Y TRANSPORTES';
        $client->save();

        $client = new Client();
        $client->acronym = 'FÁBRICA DE SOFTWARE ISSSTE';
        $client->name = 'FÁBRICA DE SOFTWARE ISSSTE';
        $client->save();

        $client = new Client();
        $client->acronym = 'SECRETARÍA DE SALUD';
        $client->name = 'SECRETARÍA DE SALUD';
        $client->save();

        $client = new Client();
        $client->acronym = 'SERVICIO NACIONAL DE SANIDAD, INOCUIDAD Y CALIDAD AGROALIMENTARIA';
        $client->name = 'SERVICIO NACIONAL DE SANIDAD, INOCUIDAD Y CALIDAD AGROALIMENTARIA';
        $client->save();

        $client = new Client();
        $client->acronym = 'CONAGUA';
        $client->name = 'COMISIÓN NACIONAL DEL AGUA';
        $client->save();

        $client = new Client();
        $client->acronym = 'SECRETARÍA DEL TRABAJO Y PREVISIÓN SOCIAL';
        $client->name = 'SECRETARÍA DEL TRABAJO Y PREVISIÓN SOCIAL';
        $client->save();

        $client = new Client();
        $client->acronym = 'COMISIÓN FEDERAL PARA LA PROTECCIÓN CONTRA RIESGOS SANITARIOS';
        $client->name = 'COMISIÓN FEDERAL PARA LA PROTECCIÓN CONTRA RIESGOS SANITARIOS';
        $client->save();

        $client = new Client();
        $client->acronym = 'SECRETARÍA DE AGRICULTURA Y DESARROLLO RURAL';
        $client->name = 'SECRETARÍA DE AGRICULTURA Y DESARROLLO RURAL';
        $client->save();

        $client = new Client();
        $client->acronym = 'COMISIÓN FEDERAL DE ELECTRICIDAD TELECOMUNICACIONES E INTERNET PARA TODOS';
        $client->name = 'COMISIÓN FEDERAL DE ELECTRICIDAD TELECOMUNICACIONES E INTERNET PARA TODOS';
        $client->save();

        $client = new Client();
        $client->acronym = 'INSTITUTO PARA LA PROTECCIÓN AL AHORRO BANCARIO';
        $client->name = 'INSTITUTO PARA LA PROTECCIÓN AL AHORRO BANCARIO';
        $client->save();

        $client = new Client();
        $client->acronym = 'RELEX';
        $client->name = 'SECRETARÍA DE RELACIONES EXTERIORES';
        $client->save();

        $client = new Client();
        $client->acronym = 'LOTERIA NACIONAL PARA LA ASISTENCIA PÚBLICA';
        $client->name = 'LOTERIA NACIONAL PARA LA ASISTENCIA PÚBLICA';
        $client->save();

        $client = new Client();
        $client->acronym = 'LUZ Y FUERZA DEL CENTRO';
        $client->name = 'LUZ Y FUERZA DEL CENTRO';
        $client->save();


        $client = new Client();
        $client->acronym = 'SECRETARÍA DE HACIENDA Y CRÉDITO PÚBLICO - COMPRANET';
        $client->name = 'SECRETARÍA DE HACIENDA Y CRÉDITO PÚBLICO - COMPRANET';
        $client->save();


        $client = new Client();
        $client->acronym = 'INSTITUTO DE ADMINISTRACIÓN Y AVALÚOS DE BIENES NACIONALES';
        $client->name = 'INSTITUTO DE ADMINISTRACIÓN Y AVALÚOS DE BIENES NACIONALES';
        $client->save();


        $client = new Client();
        $client->acronym = 'SISTEMA DE EVALUACIONES DE LA ARMONIZACIÓN CONTABLE';
        $client->name = 'SISTEMA DE EVALUACIONES DE LA ARMONIZACIÓN CONTABLE';
        $client->save();


       




    }
}
