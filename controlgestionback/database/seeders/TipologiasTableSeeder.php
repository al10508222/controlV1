<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
class TipologiasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('tipologias')->delete();
        \DB::table('tipologias')->insert(
           [
               [
                   'id'     =>  1,
                   'TIPOLOGIANOMBRE' =>  'NO ESPECIFICADO',
                   'TIPOLOGIAID'   => '99'
               ],
               [
                   'id'     =>  2,
                   'TIPOLOGIANOMBRE' =>  'HOSPITAL ESPECIALIZADO',
                   'TIPOLOGIAID'   => '0'
               ],
               [
                   'id'     =>  3,
                   'TIPOLOGIANOMBRE' =>  'URBANO DE 12 NUCLEOS BASICOS Y MAS',
                   'TIPOLOGIAID'   => 'S'
               ],
               [
                   'id'     =>  4,
                   'TIPOLOGIANOMBRE' =>  'UNIDAD MEDICA DE ATENCION AMBULATORIA',
                   'TIPOLOGIAID'   => 'UMAA'
               ],
               [
                   'id'     =>  5,
                   'TIPOLOGIANOMBRE' =>  'HOSPITAL GENERAL',
                   'TIPOLOGIAID'   => 'HG'
               ],
               [
                   'id'     =>  6,
                   'TIPOLOGIANOMBRE' =>  'RURAL DE 02 NUCLEOS BASICOS',
                   'TIPOLOGIAID'   => 'B'
               ],
               [
                   'id'     =>  7,
                   'TIPOLOGIANOMBRE' =>  'UNIDAD MEDICA URBANA',
                   'TIPOLOGIAID'   => 'UMU'
               ],
               [
                   'id'     =>  8,
                   'TIPOLOGIANOMBRE' =>  'UNIDAD MEDICA MOVIL',
                   'TIPOLOGIAID'   => 'UMM'
               ],
               [
                   'id'     =>  9,
                   'TIPOLOGIANOMBRE' =>  'UNIDAD DE DETECCION Y DIAGNOSTICO',
                   'TIPOLOGIAID'   => 'UCMA'
               ],
               [
                   'id'     =>  10,
                   'TIPOLOGIANOMBRE' =>  'UNIDAD MOVIL',
                   'TIPOLOGIAID'   => 'UM'
               ],
               [
                   'id'     =>  11,
                   'TIPOLOGIANOMBRE' =>  'HOSPITAL DE ESPECIALIDADES',
                   'TIPOLOGIAID'   => 'HESP'
               ],
               [
                   'id'     =>  12,
                   'TIPOLOGIANOMBRE' =>  'SERVICIOS MEDICOS PERICIALES',
                   'TIPOLOGIAID'   => 'PERICIALES'
               ],
               [
                   'id'     =>  13,
                   'TIPOLOGIANOMBRE' =>  'CENTRO COMUNITARIO DE SALUD MENTAL',
                   'TIPOLOGIAID'   => 'CCSM'
               ],
               [
                   'id'     =>  14,
                   'TIPOLOGIANOMBRE' =>  'LABORATORIOS',
                   'TIPOLOGIAID'   => 'LAB'
               ],
               [
                   'id'     =>  15,
                   'TIPOLOGIANOMBRE' =>  'UNIDAD MOVIL',
                   'TIPOLOGIAID'   => 'P'
               ],
               [
                   'id'     =>  16,
                   'TIPOLOGIANOMBRE' =>  'UNIDAD DE MEDICINA FAMILIAR',  
                   'TIPOLOGIAID'   => 'UMF'
               ],
               [
                   'id'     =>  17,
                   'TIPOLOGIANOMBRE' =>  'CONSULTORIO DE ATENCION FAMILIAR',
                   'TIPOLOGIAID'   => 'CAF'
               ],
               [
                   'id'     =>  18,
                   'TIPOLOGIANOMBRE' =>  'CONSULTORIO PARTICULAR',
                   'TIPOLOGIAID'   => 'CP'
               ],
               [
                   'id'     =>  19,
                   'TIPOLOGIANOMBRE' =>  'SERVICIO MEDICO FORENSE',
                   'TIPOLOGIAID'   => 'SEMEFO'
               ],
               [
                   'id'     =>  20,
                   'TIPOLOGIANOMBRE' =>  'CONSULTORIO MEDICO EN CENTRO DE TRABAJO',
                   'TIPOLOGIAID'   => 'CMCT'
               ],
               [
                   'id'     =>  21,
                   'TIPOLOGIANOMBRE' =>  'OTRO',
                   'TIPOLOGIAID'   => 'OTR'
               ],
               [
                   'id'     =>  22,
                   'TIPOLOGIANOMBRE' =>  'HOSPITAL REGIONAL / HOSPITAL DE ALTA ESPECIALIDAD',
                   'TIPOLOGIAID'   => 'HR/HAE'
               ],
               [
                   'id'     =>  23,
                   'TIPOLOGIANOMBRE' =>  'CONSULTORIO DELEGACIONAL',
                   'TIPOLOGIAID'   => 'U'
               ],
               [
                   'id'     =>  24,
                   'TIPOLOGIANOMBRE' =>  'OTRA CONSULTA EXTERNA',
                   'TIPOLOGIAID'   => 'OTCE'
               ],
               [
                   'id'     =>  25,
                   'TIPOLOGIANOMBRE' =>  'HOSPITAL INFECTOLOGIA',
                   'TIPOLOGIAID'   => 'HINF'
               ],
               [
                   'id'     =>  26,
                   'TIPOLOGIANOMBRE' =>  'UNIDAD MEDICINA RURAL - ESQUEMA MODIFICADO',
                   'TIPOLOGIAID'   => 'UMR'
               ],
               [
                   'id'     =>  27,
                   'TIPOLOGIANOMBRE' =>  'HOSPITAL DE TRAUMATOLOGIA Y ORTOPEDIA',
                   'TIPOLOGIAID'   => 'HTO'
               ],
               [
                   'id'     =>  28,
                   'TIPOLOGIANOMBRE' =>  'HOSPILTAL DE CARDIOLOGIA',
                   'TIPOLOGIAID'   => 'HCARD'
               ],
               [
                   'id'     =>  29,
                   'TIPOLOGIANOMBRE' =>  'URBANO DE 02 NUCLEOS BASICOS',
                   'TIPOLOGIAID'   => 'E'
               ],
               [
                   'id'     =>  30,
                   'TIPOLOGIANOMBRE' =>  'CENTROS DE SALUD CON SERVICIOS AMPLIADOS',
                   'TIPOLOGIAID'   => 'CES'
               ],
               [
                   'id'     =>  31,
                   'TIPOLOGIANOMBRE' =>  'HOSPITAL GENERAL DE ZONA',
                   'TIPOLOGIAID'   => 'HGZ'
               ],
               [
                   'id'     =>  32,
                   'TIPOLOGIANOMBRE' =>  'URBANO DE 09 NUCLEOS BASICOS',
                   'TIPOLOGIAID'   => 'L'
               ],
               [
                   'id'     =>  33,
                   'TIPOLOGIANOMBRE' =>  'CENTRO DE SALUD CON HOSPITALIZACION',
                   'TIPOLOGIAID'   => 'Z'
               ],
               [
                   'id'     =>  34,
                   'TIPOLOGIANOMBRE' =>  'BRIGADA MOVIL',
                   'TIPOLOGIAID'   => 'X'
               ],
               [
                   'id'     =>  35,
                   'TIPOLOGIANOMBRE' =>  'CENTRO DE ATENCION RURAL OBSTETRICA',
                   'TIPOLOGIAID'   => 'CARO'
               ],
               [
                   'id'     =>  36,
                   'TIPOLOGIANOMBRE' =>  'BANCO DE SANGRE',
                   'TIPOLOGIAID'   => 'BS'
               ],
               [
                   'id'     =>  37,
                   'TIPOLOGIANOMBRE' =>  'HOSPITAL GENERAL DE ZONA CON MEDICINA FAMILIAR',
                   'TIPOLOGIAID'   => 'HGZMF'
               ],
               [
                   'id'     =>  38,
                   'TIPOLOGIANOMBRE' =>  'CENTRO MEDICO NACIONAL',
                   'TIPOLOGIAID'   => 'CMN'
               ],
               [
                   'id'     =>  39,
                   'TIPOLOGIANOMBRE' =>  'UNIDAD DE MEDICINA FAMILIAR DE DOS CONSULTORIOS',
                   'TIPOLOGIAID'   => 'UMFB'
               ],
               [
                   'id'     =>  40,
                   'TIPOLOGIANOMBRE' =>  'URBANO DE 08 NUCLEOS BASICOS',
                   'TIPOLOGIAID'   => 'K'
               ],
               [
                   'id'     =>  41,
                   'TIPOLOGIANOMBRE' =>  'RURAL DE 01 NUCLEO BASICO',
                   'TIPOLOGIAID'   => 'A'
               ],
               [
                   'id'     =>  42,
                   'TIPOLOGIANOMBRE' =>  'ANTIRRABICOS (CONTROL CANINO)',
                   'TIPOLOGIAID'   => 'ANT'
               ],
               [
                   'id'     =>  43,
                   'TIPOLOGIANOMBRE' =>  'URBANO DE 07 NUCLEOS BASICOS',
                   'TIPOLOGIAID'   => 'J'
               ],
               [
                   'id'     =>  44,
                   'TIPOLOGIANOMBRE' =>  'HOSPITAL INTEGRAL (COMUNITARIO)',
                   'TIPOLOGIAID'   => 'N'
               ],
               [
                   'id'     =>  45,
                   'TIPOLOGIANOMBRE' =>  'HOSPITAL DE GINECO-OBSTETRICIA',
                   'TIPOLOGIAID'   => 'HGO'
               ],
               [
                   'id'     =>  46,
                   'TIPOLOGIANOMBRE' =>  'HOSPITAL GENERAL REGIONAL',
                   'TIPOLOGIAID'   => 'HGR'
               ],
               [
                   'id'     =>  47,
                   'TIPOLOGIANOMBRE' =>  'HOSPITAL GENERAL DE SUBZONA',
                   'TIPOLOGIAID'   => 'HGS'
               ],
               [
                   'id'     =>  48,
                   'TIPOLOGIANOMBRE' =>  'HOSPITAL DE GINECO-PEDIATRIA',
                   'TIPOLOGIAID'   => 'HGP'
               ],
               [
                   'id'     =>  49,
                   'TIPOLOGIANOMBRE' =>  'LABORATORIO DE CITOLOGIA',
                   'TIPOLOGIAID'   => 'LRCE'
               ],
               [
                   'id'     =>  50,
                   'TIPOLOGIANOMBRE' =>  'CLINICA',
                   'TIPOLOGIAID'   => 'CLI'
               ],
               [
                   'id'     =>  51,
                   'TIPOLOGIANOMBRE' =>  'URBANO DE 01 NUCLEOS BASICOS',
                   'TIPOLOGIAID'   => 'D'
               ],
               [
                   'id'     =>  52,
                   'TIPOLOGIANOMBRE' =>  'URBANO DE 06 NUCLEOS BASICOS',
                   'TIPOLOGIAID'   => 'I'
               ],
               [
                   'id'     =>  53,
                   'TIPOLOGIANOMBRE' =>  'CLINICA DE MEDICINA FAMILIAR',
                   'TIPOLOGIAID'   => 'CMF'
               ],
               [
                   'id'     =>  54,
                   'TIPOLOGIANOMBRE' =>  'RURAL DE 03 NUCLEOS BASICOS Y MAS',
                   'TIPOLOGIAID'   => 'C'
               ],
               [
                   'id'     =>  55,
                   'TIPOLOGIANOMBRE' =>  'UNIDAD DE ESPECIALIDADES MEDICAS (UNEMES)',
                   'TIPOLOGIAID'   => 'UNE'
               ],
               [
                   'id'     =>  56,
                   'TIPOLOGIANOMBRE' =>  'UNIDAD DE MEDICINA FAMILIAR CON HOSPITALIZACION',
                   'TIPOLOGIAID'   => 'UMFH'
               ],
               [
                   'id'     =>  57,
                   'TIPOLOGIANOMBRE' =>  'HOSPITAL DE ORTOPEDIA',
                   'TIPOLOGIAID'   => 'HORTO'
               ],
               [
                   'id'     =>  58,
                   'TIPOLOGIANOMBRE' =>  'HOPITAL DE PSIQUIATRIA',
                   'TIPOLOGIAID'   => 'HPSIQ'
               ],
               [
                   'id'     =>  59,
                   'TIPOLOGIANOMBRE' =>  'HOSPITAL PEDIATRIA',
                   'TIPOLOGIAID'   => 'HPED'
               ],
               [
                   'id'     =>  60,
                   'TIPOLOGIANOMBRE' =>  'HOSPITAL GENERAL',
                   'TIPOLOGIAID'   => 'M'
               ],
               [
                   'id'     =>  61,
                   'TIPOLOGIANOMBRE' =>  'URBANO DE 05 NUCLEOS BASICOS',
                   'TIPOLOGIAID'   => 'H'
               ],
               [
                   'id'     =>  62,
                   'TIPOLOGIANOMBRE' =>  'HOSPITAL GENERAL DE SUBZONA CON MEDICINA FAMILIAR',
                   'TIPOLOGIAID'   => 'HGSMF'
               ],
               [
                   'id'     =>  63,
                   'TIPOLOGIANOMBRE' =>  'CASA DE SALUD',
                   'TIPOLOGIAID'   => 'W'
               ],
               [
                   'id'     =>  64,
                   'TIPOLOGIANOMBRE' =>  'HOSPITAL RURAL',
                   'TIPOLOGIAID'   => 'HR'
               ],
               [
                   'id'     =>  65,
                   'TIPOLOGIANOMBRE' =>  'HOSPITAL DE TRAUMATOLOGIA',
                   'TIPOLOGIAID'   => 'HTRA'
               ],
               [
                   'id'     =>  66,
                   'TIPOLOGIANOMBRE' =>  'CLINICA DE ESPECIALIDADES',
                   'TIPOLOGIAID'   => 'CE'
               ],
               [
                   'id'     =>  67,
                   'TIPOLOGIANOMBRE' =>  'HOSPITAL MOVIL',
                   'TIPOLOGIAID'   => 'HM'
               ],
               [
                   'id'     =>  68,
                   'TIPOLOGIANOMBRE' =>  'CONSULTA EXTERNA DE ESPECIALIDADES',
                   'TIPOLOGIAID'   => 'CEXT'
               ],
               [
                   'id'     =>  69,
                   'TIPOLOGIANOMBRE' =>  'HOPITAL PSIQUIATRIA CON MEDICINA FAMILIAR',
                   'TIPOLOGIAID'   => 'HPSIQMF'
               ],
               [
                   'id'     =>  70,
                   'TIPOLOGIANOMBRE' =>  'CLINICA DE ESPECIALIDADES',
                   'TIPOLOGIAID'   => 'T'
               ],
               [
                   'id'     =>  71,
                   'TIPOLOGIANOMBRE' =>  'HOSPITAL PSIQUIATRICO',
                   'TIPOLOGIAID'   => 'T'
               ],
               [
                   'id'     =>  72,
                   'TIPOLOGIANOMBRE' =>  'ALMACENES',
                   'TIPOLOGIAID'   => 'ALM'
               ],
               [
                   'id'     =>  73,
                   'TIPOLOGIANOMBRE' =>  'UNIDAD DE MEDICINA FAMILIAR DE UN CONSULTORIO',
                   'TIPOLOGIAID'   => 'UFMA'
               ],
               [
                   'id'     =>  74,
                   'TIPOLOGIANOMBRE' =>  'NO ESPECIFICADO',
                   'TIPOLOGIAID'   => 'NES'
               ],
               [
                   'id'     =>  75,
                   'TIPOLOGIANOMBRE' =>  'URBANO DE 10 NUCLEOS BASICOS',
                   'TIPOLOGIAID'   => 'Q'
               ],
               [
                   'id'     =>  76,
                   'TIPOLOGIANOMBRE' =>  'UNIDAD DE MEDICINA FISICA Y REHABILITACION',
                   'TIPOLOGIAID'   => 'UMFR'
               ],
               [
                   'id'     =>  77,
                   'TIPOLOGIANOMBRE' =>  'UNIDAD MINISTERIO PUBLICO',
                   'TIPOLOGIAID'   => 'V'
               ],
               [
                   'id'     =>  78,
                   'TIPOLOGIANOMBRE' =>  'URBANO DE 11 NUCLEOS BASICOS',
                   'TIPOLOGIAID'   => 'R'
               ],
               [
                   'id'     =>  79,
                   'TIPOLOGIANOMBRE' =>  'HOSPITAL DE ONCOLOGIA',
                   'TIPOLOGIAID'   => 'HONCO'
               ],
               [
                   'id'     =>  80,
                   'TIPOLOGIANOMBRE' =>  'CENTRO DE VACUNACION',
                   'TIPOLOGIAID'   => 'CV'
               ],
               [
                   'id'     =>  81,
                   'TIPOLOGIANOMBRE' =>  'URBANO DE 04 NUCLEOS BASICOS',
                   'TIPOLOGIAID'   => 'G'
               ],
               [
                   'id'     =>  82,
                   'TIPOLOGIANOMBRE' =>  'URBANO DE 03 NUCLEOS BASICOS',
                   'TIPOLOGIAID'   => 'F'
               ],
               [
                   'id'     =>  83,
                   'TIPOLOGIANOMBRE' =>  'OFICINAS ADMINISTRATIVAS',
                   'TIPOLOGIAID'   => 'OFI'
               ],
               [
                   'id'     =>  84,
                   'TIPOLOGIANOMBRE' =>  'CLINICA HOSPITAL',
                   'TIPOLOGIAID'   => 'CH'
               ],
               [
                   'id'     =>  85,
                   'TIPOLOGIANOMBRE' =>  'CLINICA DE MEDICINA FAMILIAR CON ESPECIALIDADES',
                   'TIPOLOGIAID'   => 'CMFE'
               ],
               [
                   'id'     =>  86,
                   'TIPOLOGIANOMBRE' =>  'CENTRO DE PREVENCION EN ADICCIONES',
                   'TIPOLOGIAID'   => 'CPA'
               ],
               [
                   'id'     =>  87,
                   'TIPOLOGIANOMBRE' =>  'UNIDAD DE CONTROL METABOLICO AMBULATORIO',
                   'TIPOLOGIAID'   => 'UDDX'
               ],
               [
                   'id'     =>  88,
                   'TIPOLOGIANOMBRE' =>  'NO APLICA',
                   'TIPOLOGIAID'   => 'NA'
               ],
               [
                   'id'     =>  89,
                   'TIPOLOGIANOMBRE' =>  'MICROREGION',
                   'TIPOLOGIAID'   => 'MR'
               ]
            ]
       );
    }
}
