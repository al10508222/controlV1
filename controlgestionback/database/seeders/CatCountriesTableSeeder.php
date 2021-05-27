<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class CatCountriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('cat_countries')->delete();
        \DB::table('cat_countries')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Afganistán',
                'countryCode' => 'AFG',
                'iso2' => 'AF',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:23:41',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Albania',
                'countryCode' => 'ALB',
                'iso2' => 'AL',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Algeria',
                'countryCode' => 'DZA',
                'iso2' => 'DZ',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:43',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Samoa Americana',
                'countryCode' => 'ASM',
                'iso2' => 'AS',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:43',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Andorra',
                'countryCode' => 'AND',
                'iso2' => 'AD',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:43',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Angola',
                'countryCode' => 'AGO',
                'iso2' => 'AO',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:43',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Anguila',
                'countryCode' => 'AIA',
                'iso2' => 'AI',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:43',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Antártida',
                'countryCode' => 'ATA',
                'iso2' => 'AQ',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:43',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Antigua y Barbuda',
                'countryCode' => 'ATG',
                'iso2' => 'AG',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:43',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Argentina',
                'countryCode' => 'ARG',
                'iso2' => 'AR',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:43',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Armenia',
                'countryCode' => 'ARM',
                'iso2' => 'AM',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:43',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Aruba',
                'countryCode' => 'ABW',
                'iso2' => 'AW',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:43',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Australia',
                'countryCode' => 'AUS',
                'iso2' => 'AU',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:43',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Austria',
                'countryCode' => 'AUT',
                'iso2' => 'AT',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:43',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Azerbayán',
                'countryCode' => 'AZE',
                'iso2' => 'AZ',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:43',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Bahamas',
                'countryCode' => 'BHS',
                'iso2' => 'BS',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:43',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Bahrein',
                'countryCode' => 'BHR',
                'iso2' => 'BH',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:43',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Bangladesh',
                'countryCode' => 'BGD',
                'iso2' => 'BD',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:43',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Barbados',
                'countryCode' => 'BRB',
                'iso2' => 'BB',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:43',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Bielorrusia',
                'countryCode' => 'BLR',
                'iso2' => 'BY',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:43',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'Bélgica',
                'countryCode' => 'BEL',
                'iso2' => 'BE',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:43',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'Belice',
                'countryCode' => 'BLZ',
                'iso2' => 'BZ',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:43',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'Benín',
                'countryCode' => 'BEN',
                'iso2' => 'BJ',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:43',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'Islas Bermudas',
                'countryCode' => 'BMU',
                'iso2' => 'BM',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:43',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'Bhután',
                'countryCode' => 'BTN',
                'iso2' => 'BT',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:43',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'Bolivia',
                'countryCode' => 'BOL',
                'iso2' => 'BO',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:43',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'Bosnia y Herzegovina',
                'countryCode' => 'BIH',
                'iso2' => 'BA',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:43',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'Botsuana',
                'countryCode' => 'BWA',
                'iso2' => 'BW',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:43',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'Isla Bouvet',
                'countryCode' => 'BVT',
                'iso2' => 'BV',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:43',
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'Brasil',
                'countryCode' => 'BRA',
                'iso2' => 'BR',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:43',
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'Territorio Británico del Océano Índico',
                'countryCode' => 'IOT',
                'iso2' => 'IO',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:43',
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'Brunéi',
                'countryCode' => 'BRN',
                'iso2' => 'BN',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:43',
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'Bulgaria',
                'countryCode' => 'BGR',
                'iso2' => 'BG',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:43',
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'Burkina Faso',
                'countryCode' => 'BFA',
                'iso2' => 'BF',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:43',
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'Burundi',
                'countryCode' => 'BDI',
                'iso2' => 'BI',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:43',
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'Camboya',
                'countryCode' => 'KHM',
                'iso2' => 'KH',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:43',
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'Camerún',
                'countryCode' => 'CMR',
                'iso2' => 'CM',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:43',
            ),
            37 => 
            array (
                'id' => 38,
                'name' => 'Canadá',
                'countryCode' => 'CAN',
                'iso2' => 'CA',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:43',
            ),
            38 => 
            array (
                'id' => 39,
                'name' => 'Cabo Verde',
                'countryCode' => 'CPV',
                'iso2' => 'CV',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:43',
            ),
            39 => 
            array (
                'id' => 40,
                'name' => 'Islas Caimán',
                'countryCode' => 'CYM',
                'iso2' => 'KY',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:43',
            ),
            40 => 
            array (
                'id' => 41,
                'name' => 'República Centroafricana',
                'countryCode' => 'CAF',
                'iso2' => 'CF',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:43',
            ),
            41 => 
            array (
                'id' => 42,
                'name' => 'Chad',
                'countryCode' => 'TCD',
                'iso2' => 'TD',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:43',
            ),
            42 => 
            array (
                'id' => 43,
                'name' => 'Chile',
                'countryCode' => 'CHL',
                'iso2' => 'CL',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:43',
            ),
            43 => 
            array (
                'id' => 44,
                'name' => 'China',
                'countryCode' => 'CHN',
                'iso2' => 'CN',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:43',
            ),
            44 => 
            array (
                'id' => 45,
                'name' => 'Isla de Navidad',
                'countryCode' => 'CXR',
                'iso2' => 'CX',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:43',
            ),
            45 => 
            array (
                'id' => 46,
            'name' => 'Islas Cocos (Keeling)',
                'countryCode' => 'CCK',
                'iso2' => 'CC',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:43',
            ),
            46 => 
            array (
                'id' => 47,
                'name' => 'Colombia',
                'countryCode' => 'COL',
                'iso2' => 'CO',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:43',
            ),
            47 => 
            array (
                'id' => 48,
                'name' => 'Comoras',
                'countryCode' => 'COM',
                'iso2' => 'KM',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:43',
            ),
            48 => 
            array (
                'id' => 49,
                'name' => 'Congo',
                'countryCode' => 'COG',
                'iso2' => 'CG',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:43',
            ),
            49 => 
            array (
                'id' => 50,
                'name' => 'Congo',
                'countryCode' => 'COD',
                'iso2' => 'CD',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:43',
            ),
            50 => 
            array (
                'id' => 51,
                'name' => 'Islas Cook',
                'countryCode' => 'COK',
                'iso2' => 'CK',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:43',
            ),
            51 => 
            array (
                'id' => 52,
                'name' => 'Costa Rica',
                'countryCode' => 'CRI',
                'iso2' => 'CR',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:43',
            ),
            52 => 
            array (
                'id' => 53,
                'name' => 'Costa de Marfil',
                'countryCode' => 'CIV',
                'iso2' => 'CI',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:43',
            ),
            53 => 
            array (
                'id' => 54,
                'name' => 'Croacia',
                'countryCode' => 'HRV',
                'iso2' => 'HR',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:43',
            ),
            54 => 
            array (
                'id' => 55,
                'name' => 'Cuba',
                'countryCode' => 'CUB',
                'iso2' => 'CU',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:43',
            ),
            55 => 
            array (
                'id' => 56,
                'name' => 'Chipre',
                'countryCode' => 'CYP',
                'iso2' => 'CY',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:43',
            ),
            56 => 
            array (
                'id' => 57,
                'name' => 'República Checa',
                'countryCode' => 'CZE',
                'iso2' => 'CZ',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:43',
            ),
            57 => 
            array (
                'id' => 58,
                'name' => 'Dinamarca',
                'countryCode' => 'DNK',
                'iso2' => 'DK',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:43',
            ),
            58 => 
            array (
                'id' => 59,
                'name' => 'Yibuti',
                'countryCode' => 'DJI',
                'iso2' => 'DJ',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:43',
            ),
            59 => 
            array (
                'id' => 60,
                'name' => 'Dominica',
                'countryCode' => 'DMA',
                'iso2' => 'DM',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:43',
            ),
            60 => 
            array (
                'id' => 61,
                'name' => 'República Dominicana',
                'countryCode' => 'DOM',
                'iso2' => 'DO',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:07:44',
            ),
            61 => 
            array (
                'id' => 62,
                'name' => 'Timor Oriental',
                'countryCode' => 'TLS',
                'iso2' => 'TP',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:11:23',
            ),
            62 => 
            array (
                'id' => 63,
                'name' => 'Ecuador',
                'countryCode' => 'ECU',
                'iso2' => 'EC',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:11:23',
            ),
            63 => 
            array (
                'id' => 64,
                'name' => 'Egipto',
                'countryCode' => 'EGY',
                'iso2' => 'EG',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:11:23',
            ),
            64 => 
            array (
                'id' => 65,
                'name' => 'El Salvador',
                'countryCode' => 'SLV',
                'iso2' => 'SV',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:11:23',
            ),
            65 => 
            array (
                'id' => 66,
                'name' => 'Guinea Ecuatorial',
                'countryCode' => 'GNQ',
                'iso2' => 'GQ',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:11:23',
            ),
            66 => 
            array (
                'id' => 67,
                'name' => 'Eritrea',
                'countryCode' => 'ERI',
                'iso2' => 'ER',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:11:23',
            ),
            67 => 
            array (
                'id' => 68,
                'name' => 'Estonia',
                'countryCode' => 'EST',
                'iso2' => 'EE',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:11:23',
            ),
            68 => 
            array (
                'id' => 69,
                'name' => 'Etiopía',
                'countryCode' => 'ETH',
                'iso2' => 'ET',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:11:23',
            ),
            69 => 
            array (
                'id' => 71,
                'name' => 'Islas Malvinas',
                'countryCode' => 'FLK',
                'iso2' => 'FK',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:13:51',
            ),
            70 => 
            array (
                'id' => 72,
                'name' => 'Islas Feroe',
                'countryCode' => 'FRO',
                'iso2' => 'FO',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:13:51',
            ),
            71 => 
            array (
                'id' => 73,
                'name' => 'Fiyi',
                'countryCode' => 'FJI',
                'iso2' => 'FJ',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:13:51',
            ),
            72 => 
            array (
                'id' => 74,
                'name' => 'Finlandia',
                'countryCode' => 'FIN',
                'iso2' => 'FI',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:13:51',
            ),
            73 => 
            array (
                'id' => 75,
                'name' => 'Francia',
                'countryCode' => 'FRA',
                'iso2' => 'FR',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:13:51',
            ),
            74 => 
            array (
                'id' => 76,
                'name' => 'Guayana Francesa',
                'countryCode' => 'GUF',
                'iso2' => 'GF',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:13:51',
            ),
            75 => 
            array (
                'id' => 77,
                'name' => 'Polinesia Francesa',
                'countryCode' => 'PYF',
                'iso2' => 'PF',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:13:51',
            ),
            76 => 
            array (
                'id' => 78,
                'name' => 'Territorios Australes y Antárticas Franceses',
                'countryCode' => 'ATF',
                'iso2' => 'TF',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:13:51',
            ),
            77 => 
            array (
                'id' => 79,
                'name' => 'Gabón',
                'countryCode' => 'GAB',
                'iso2' => 'GA',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:13:51',
            ),
            78 => 
            array (
                'id' => 80,
                'name' => 'Gambia',
                'countryCode' => 'GMB',
                'iso2' => 'GM',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:13:51',
            ),
            79 => 
            array (
                'id' => 81,
                'name' => 'Georgia',
                'countryCode' => 'GEO',
                'iso2' => 'GE',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:13:51',
            ),
            80 => 
            array (
                'id' => 82,
                'name' => 'Alemania',
                'countryCode' => 'DEU',
                'iso2' => 'DE',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:13:51',
            ),
            81 => 
            array (
                'id' => 83,
                'name' => 'Ghana',
                'countryCode' => 'GHA',
                'iso2' => 'GH',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:13:51',
            ),
            82 => 
            array (
                'id' => 84,
                'name' => 'Gibraltar',
                'countryCode' => 'GIB',
                'iso2' => 'GI',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:13:51',
            ),
            83 => 
            array (
                'id' => 85,
                'name' => 'Grecia',
                'countryCode' => 'GRC',
                'iso2' => 'GR',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:13:51',
            ),
            84 => 
            array (
                'id' => 86,
                'name' => 'Groenlandia',
                'countryCode' => 'GRL',
                'iso2' => 'GL',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:13:51',
            ),
            85 => 
            array (
                'id' => 87,
                'name' => 'Granada',
                'countryCode' => 'GRD',
                'iso2' => 'GD',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:13:51',
            ),
            86 => 
            array (
                'id' => 88,
                'name' => 'Guadalupe',
                'countryCode' => 'GLP',
                'iso2' => 'GP',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:13:51',
            ),
            87 => 
            array (
                'id' => 89,
                'name' => 'Guam',
                'countryCode' => 'GUM',
                'iso2' => 'GU',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:13:51',
            ),
            88 => 
            array (
                'id' => 90,
                'name' => 'Guatemala',
                'countryCode' => 'GTM',
                'iso2' => 'GT',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:13:51',
            ),
            89 => 
            array (
                'id' => 91,
                'name' => 'Guernsey',
                'countryCode' => 'GGY',
                'iso2' => 'GG',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            90 => 
            array (
                'id' => 92,
                'name' => 'Guinea',
                'countryCode' => 'GIN',
                'iso2' => 'GN',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:17:18',
            ),
            91 => 
            array (
                'id' => 93,
                'name' => 'Guinea-Bissau',
                'countryCode' => 'GNB',
                'iso2' => 'GW',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:17:18',
            ),
            92 => 
            array (
                'id' => 94,
                'name' => 'Guyana',
                'countryCode' => 'GUY',
                'iso2' => 'GY',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:17:18',
            ),
            93 => 
            array (
                'id' => 95,
                'name' => 'Haití',
                'countryCode' => 'HTI',
                'iso2' => 'HT',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:17:18',
            ),
            94 => 
            array (
                'id' => 96,
                'name' => 'Islas Heard y McDonald',
                'countryCode' => 'HMD',
                'iso2' => 'HM',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:17:18',
            ),
            95 => 
            array (
                'id' => 97,
                'name' => 'Honduras',
                'countryCode' => 'HND',
                'iso2' => 'HN',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:17:18',
            ),
            96 => 
            array (
                'id' => 98,
                'name' => 'Hong kong',
                'countryCode' => 'HKG',
                'iso2' => 'HK',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:17:18',
            ),
            97 => 
            array (
                'id' => 99,
                'name' => 'Hungría',
                'countryCode' => 'HUN',
                'iso2' => 'HU',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:17:18',
            ),
            98 => 
            array (
                'id' => 100,
                'name' => 'Islandia',
                'countryCode' => 'ISL',
                'iso2' => 'IS',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:17:18',
            ),
            99 => 
            array (
                'id' => 101,
                'name' => 'India',
                'countryCode' => 'IND',
                'iso2' => 'IN',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:17:18',
            ),
            100 => 
            array (
                'id' => 102,
                'name' => 'Indonesia',
                'countryCode' => 'IDN',
                'iso2' => 'ID',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:17:18',
            ),
            101 => 
            array (
                'id' => 103,
                'name' => 'Irán',
                'countryCode' => 'IRN',
                'iso2' => 'IR',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:17:18',
            ),
            102 => 
            array (
                'id' => 104,
                'name' => 'Irak',
                'countryCode' => 'IRQ',
                'iso2' => 'IQ',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:17:18',
            ),
            103 => 
            array (
                'id' => 105,
                'name' => 'Irlanda',
                'countryCode' => 'IRL',
                'iso2' => 'IE',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:17:18',
            ),
            104 => 
            array (
                'id' => 106,
                'name' => 'Israel',
                'countryCode' => 'ISR',
                'iso2' => 'IL',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:17:18',
            ),
            105 => 
            array (
                'id' => 107,
                'name' => 'Italia',
                'countryCode' => 'ITA',
                'iso2' => 'IT',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:17:18',
            ),
            106 => 
            array (
                'id' => 108,
                'name' => 'Jamaica',
                'countryCode' => 'JAM',
                'iso2' => 'JM',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:17:18',
            ),
            107 => 
            array (
                'id' => 109,
                'name' => 'Japón',
                'countryCode' => 'JPN',
                'iso2' => 'JP',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:17:18',
            ),
            108 => 
            array (
                'id' => 110,
                'name' => 'Jersey',
                'countryCode' => 'JEY',
                'iso2' => 'JE',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            109 => 
            array (
                'id' => 111,
                'name' => 'Jordania',
                'countryCode' => 'JOR',
                'iso2' => 'JO',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:19:32',
            ),
            110 => 
            array (
                'id' => 112,
                'name' => 'Kazajistán',
                'countryCode' => 'KAZ',
                'iso2' => 'KZ',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:19:32',
            ),
            111 => 
            array (
                'id' => 113,
                'name' => 'Kenia',
                'countryCode' => 'KEN',
                'iso2' => 'KE',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:19:32',
            ),
            112 => 
            array (
                'id' => 114,
                'name' => 'Kiribati',
                'countryCode' => 'KIR',
                'iso2' => 'KI',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:19:32',
            ),
            113 => 
            array (
                'id' => 115,
                'name' => 'Corea del Norte',
                'countryCode' => 'PRK',
                'iso2' => 'KP',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:19:32',
            ),
            114 => 
            array (
                'id' => 116,
                'name' => 'Corea del Sur',
                'countryCode' => 'KOR',
                'iso2' => 'KR',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:19:32',
            ),
            115 => 
            array (
                'id' => 117,
                'name' => 'Kuwait',
                'countryCode' => 'KWT',
                'iso2' => 'KW',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:19:32',
            ),
            116 => 
            array (
                'id' => 118,
                'name' => 'Kirgizstán',
                'countryCode' => 'KGZ',
                'iso2' => 'KG',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:19:32',
            ),
            117 => 
            array (
                'id' => 119,
                'name' => 'Laos',
                'countryCode' => 'LAO',
                'iso2' => 'LA',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:19:32',
            ),
            118 => 
            array (
                'id' => 120,
                'name' => 'Letonia',
                'countryCode' => 'LVA',
                'iso2' => 'LV',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:19:32',
            ),
            119 => 
            array (
                'id' => 121,
                'name' => 'Líbano',
                'countryCode' => 'LBN',
                'iso2' => 'LB',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:19:32',
            ),
            120 => 
            array (
                'id' => 122,
                'name' => 'Lesoto',
                'countryCode' => 'LSO',
                'iso2' => 'LS',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:19:32',
            ),
            121 => 
            array (
                'id' => 123,
                'name' => 'Liberia',
                'countryCode' => 'LBR',
                'iso2' => 'LR',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:19:32',
            ),
            122 => 
            array (
                'id' => 124,
                'name' => 'Libia',
                'countryCode' => 'LBY',
                'iso2' => 'LY',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:19:32',
            ),
            123 => 
            array (
                'id' => 125,
                'name' => 'Liechtenstein',
                'countryCode' => 'LIE',
                'iso2' => 'LI',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:19:32',
            ),
            124 => 
            array (
                'id' => 126,
                'name' => 'Lituania',
                'countryCode' => 'LTU',
                'iso2' => 'LT',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:19:32',
            ),
            125 => 
            array (
                'id' => 127,
                'name' => 'Luxemburgo',
                'countryCode' => 'LUX',
                'iso2' => 'LU',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:19:32',
            ),
            126 => 
            array (
                'id' => 128,
                'name' => 'Macao',
                'countryCode' => 'MAC',
                'iso2' => 'MO',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:19:32',
            ),
            127 => 
            array (
                'id' => 129,
                'name' => 'Macedônia',
                'countryCode' => 'MKD',
                'iso2' => 'MK',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:19:32',
            ),
            128 => 
            array (
                'id' => 130,
                'name' => 'Madagascar',
                'countryCode' => 'MDG',
                'iso2' => 'MG',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:19:32',
            ),
            129 => 
            array (
                'id' => 131,
                'name' => 'Malawi',
                'countryCode' => 'MWI',
                'iso2' => 'MW',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:19:32',
            ),
            130 => 
            array (
                'id' => 132,
                'name' => 'Malasia',
                'countryCode' => 'MYS',
                'iso2' => 'MY',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:19:32',
            ),
            131 => 
            array (
                'id' => 133,
                'name' => 'Islas Maldivas',
                'countryCode' => 'MDV',
                'iso2' => 'MV',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:19:32',
            ),
            132 => 
            array (
                'id' => 134,
                'name' => 'Mali',
                'countryCode' => 'MLI',
                'iso2' => 'ML',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:19:32',
            ),
            133 => 
            array (
                'id' => 135,
                'name' => 'Malta',
                'countryCode' => 'MLT',
                'iso2' => 'MT',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:19:32',
            ),
            134 => 
            array (
                'id' => 136,
                'name' => 'Isla de Man',
                'countryCode' => 'IMN',
                'iso2' => 'IM',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            135 => 
            array (
                'id' => 137,
                'name' => 'Islas Marshall',
                'countryCode' => 'MHL',
                'iso2' => 'MH',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            136 => 
            array (
                'id' => 138,
                'name' => 'Martinica',
                'countryCode' => 'MTQ',
                'iso2' => 'MQ',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            137 => 
            array (
                'id' => 139,
                'name' => 'Mauritania',
                'countryCode' => 'MRT',
                'iso2' => 'MR',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            138 => 
            array (
                'id' => 140,
                'name' => 'Mauricio',
                'countryCode' => 'MUS',
                'iso2' => 'MU',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            139 => 
            array (
                'id' => 141,
                'name' => 'Mayotte',
                'countryCode' => 'MYT',
                'iso2' => 'YT',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            140 => 
            array (
                'id' => 142,
                'name' => 'México',
                'countryCode' => 'MEX',
                'iso2' => 'MX',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            141 => 
            array (
                'id' => 143,
                'name' => 'Micronesia',
                'countryCode' => 'FSM',
                'iso2' => 'FM',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            142 => 
            array (
                'id' => 144,
                'name' => 'Moldavia',
                'countryCode' => 'MDA',
                'iso2' => 'MD',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            143 => 
            array (
                'id' => 145,
                'name' => 'Mónaco',
                'countryCode' => 'MCO',
                'iso2' => 'MC',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            144 => 
            array (
                'id' => 146,
                'name' => 'Mongolia',
                'countryCode' => 'MNG',
                'iso2' => 'MN',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            145 => 
            array (
                'id' => 147,
                'name' => 'Montserrat',
                'countryCode' => 'MSR',
                'iso2' => 'MS',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            146 => 
            array (
                'id' => 148,
                'name' => 'Marruecos',
                'countryCode' => 'MAR',
                'iso2' => 'MA',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            147 => 
            array (
                'id' => 149,
                'name' => 'Mozambique',
                'countryCode' => 'MOZ',
                'iso2' => 'MZ',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            148 => 
            array (
                'id' => 150,
                'name' => 'Birmania',
                'countryCode' => 'MMR',
                'iso2' => 'MM',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            149 => 
            array (
                'id' => 151,
                'name' => 'Namibia',
                'countryCode' => 'NAM',
                'iso2' => 'NA',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            150 => 
            array (
                'id' => 152,
                'name' => 'Nauru',
                'countryCode' => 'NRU',
                'iso2' => 'NR',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            151 => 
            array (
                'id' => 153,
                'name' => 'Nepal',
                'countryCode' => 'NPL',
                'iso2' => 'NP',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            152 => 
            array (
                'id' => 154,
                'name' => 'Antillas Neerlandesas',
                'countryCode' => 'ANT',
                'iso2' => 'AN',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            153 => 
            array (
                'id' => 155,
                'name' => 'Países Bajos',
                'countryCode' => 'NLD',
                'iso2' => 'NL',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            154 => 
            array (
                'id' => 156,
                'name' => 'Nueva Caledonia',
                'countryCode' => 'NCL',
                'iso2' => 'NC',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            155 => 
            array (
                'id' => 157,
                'name' => 'Nueva Zelanda',
                'countryCode' => 'NZL',
                'iso2' => 'NZ',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            156 => 
            array (
                'id' => 158,
                'name' => 'Nicaragua',
                'countryCode' => 'NIC',
                'iso2' => 'NI',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            157 => 
            array (
                'id' => 159,
                'name' => 'Niger',
                'countryCode' => 'NER',
                'iso2' => 'NE',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            158 => 
            array (
                'id' => 160,
                'name' => 'Nigeria',
                'countryCode' => 'NGA',
                'iso2' => 'NG',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            159 => 
            array (
                'id' => 161,
                'name' => 'Niue',
                'countryCode' => 'NIU',
                'iso2' => 'NU',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            160 => 
            array (
                'id' => 162,
                'name' => 'Isla Norfolk',
                'countryCode' => 'NFK',
                'iso2' => 'NF',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            161 => 
            array (
                'id' => 163,
                'name' => 'Islas Marianas del Norte',
                'countryCode' => 'MNP',
                'iso2' => 'MP',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            162 => 
            array (
                'id' => 164,
                'name' => 'Noruega',
                'countryCode' => 'NOR',
                'iso2' => 'NO',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            163 => 
            array (
                'id' => 165,
                'name' => 'Omán',
                'countryCode' => 'OMN',
                'iso2' => 'OM',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            164 => 
            array (
                'id' => 166,
                'name' => 'Pakistán',
                'countryCode' => 'PAK',
                'iso2' => 'PK',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            165 => 
            array (
                'id' => 167,
                'name' => 'Palau',
                'countryCode' => 'PLW',
                'iso2' => 'PW',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            166 => 
            array (
                'id' => 168,
                'name' => 'Palestina',
                'countryCode' => 'PSE',
                'iso2' => 'PS',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            167 => 
            array (
                'id' => 169,
                'name' => 'Panamá',
                'countryCode' => 'PAN',
                'iso2' => 'PA',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            168 => 
            array (
                'id' => 170,
                'name' => 'Papúa Nueva Guinea',
                'countryCode' => 'PNG',
                'iso2' => 'PG',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            169 => 
            array (
                'id' => 171,
                'name' => 'Paraguay',
                'countryCode' => 'PRY',
                'iso2' => 'PY',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            170 => 
            array (
                'id' => 172,
                'name' => 'Perú',
                'countryCode' => 'PER',
                'iso2' => 'PE',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            171 => 
            array (
                'id' => 173,
                'name' => 'Filipinas',
                'countryCode' => 'PHL',
                'iso2' => 'PH',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            172 => 
            array (
                'id' => 174,
                'name' => 'Islas Pitcairn',
                'countryCode' => 'PCN',
                'iso2' => 'PN',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            173 => 
            array (
                'id' => 175,
                'name' => 'Polonia',
                'countryCode' => 'POL',
                'iso2' => 'PL',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            174 => 
            array (
                'id' => 176,
                'name' => 'Portugal',
                'countryCode' => 'PRT',
                'iso2' => 'PT',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            175 => 
            array (
                'id' => 177,
                'name' => 'Puerto Rico',
                'countryCode' => 'PRI',
                'iso2' => 'PR',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            176 => 
            array (
                'id' => 178,
                'name' => 'Qatar',
                'countryCode' => 'QAT',
                'iso2' => 'QA',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            177 => 
            array (
                'id' => 179,
                'name' => 'Reunión',
                'countryCode' => 'REU',
                'iso2' => 'RE',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            178 => 
            array (
                'id' => 180,
                'name' => 'Rumanía',
                'countryCode' => 'ROU',
                'iso2' => 'RO',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            179 => 
            array (
                'id' => 181,
                'name' => 'Rusia',
                'countryCode' => 'RUS',
                'iso2' => 'RU',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            180 => 
            array (
                'id' => 182,
                'name' => 'Ruanda',
                'countryCode' => 'RWA',
                'iso2' => 'RW',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            181 => 
            array (
                'id' => 183,
                'name' => 'Santa Elena',
                'countryCode' => 'SHN',
                'iso2' => 'SH',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            182 => 
            array (
                'id' => 184,
                'name' => 'San Cristóbal y Nieves',
                'countryCode' => 'KNA',
                'iso2' => 'KN',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            183 => 
            array (
                'id' => 185,
                'name' => 'Santa Lucía',
                'countryCode' => 'LCA',
                'iso2' => 'LC',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            184 => 
            array (
                'id' => 186,
                'name' => 'San Pedro y Miquelón',
                'countryCode' => 'SPM',
                'iso2' => 'PM',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            185 => 
            array (
                'id' => 187,
                'name' => 'San Vicente y las Granadinas',
                'countryCode' => 'VCT',
                'iso2' => 'VC',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            186 => 
            array (
                'id' => 188,
                'name' => 'Samoa',
                'countryCode' => 'WSM',
                'iso2' => 'WS',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            187 => 
            array (
                'id' => 189,
                'name' => 'San Marino',
                'countryCode' => 'SMR',
                'iso2' => 'SM',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            188 => 
            array (
                'id' => 190,
                'name' => 'Santo Tomé y Príncipe',
                'countryCode' => 'STP',
                'iso2' => 'ST',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            189 => 
            array (
                'id' => 191,
                'name' => 'Arabia Saudita',
                'countryCode' => 'SAU',
                'iso2' => 'SA',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            190 => 
            array (
                'id' => 192,
                'name' => 'Senegal',
                'countryCode' => 'SEN',
                'iso2' => 'SN',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            191 => 
            array (
                'id' => 193,
                'name' => 'Serbia',
                'countryCode' => 'SRB',
                'iso2' => 'RS',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            192 => 
            array (
                'id' => 194,
                'name' => 'Seychelles',
                'countryCode' => 'SYC',
                'iso2' => 'SC',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            193 => 
            array (
                'id' => 195,
                'name' => 'Sierra Leona',
                'countryCode' => 'SLE',
                'iso2' => 'SL',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            194 => 
            array (
                'id' => 196,
                'name' => 'Singapur',
                'countryCode' => 'SGP',
                'iso2' => 'SG',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            195 => 
            array (
                'id' => 197,
                'name' => 'Eslovaquia',
                'countryCode' => 'SVK',
                'iso2' => 'SK',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            196 => 
            array (
                'id' => 198,
                'name' => 'Eslovenia',
                'countryCode' => 'SVN',
                'iso2' => 'SI',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:21:19',
            ),
            197 => 
            array (
                'id' => 200,
                'name' => 'Islas Salomón',
                'countryCode' => 'SLB',
                'iso2' => 'SB',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:22:21',
            ),
            198 => 
            array (
                'id' => 201,
                'name' => 'Somalia',
                'countryCode' => 'SOM',
                'iso2' => 'SO',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:22:21',
            ),
            199 => 
            array (
                'id' => 202,
                'name' => 'Sudáfrica',
                'countryCode' => 'ZAF',
                'iso2' => 'ZA',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:22:21',
            ),
            200 => 
            array (
                'id' => 203,
                'name' => 'Islas Georgias del Sur y Sandwich del Sur',
                'countryCode' => 'SGS',
                'iso2' => 'GS',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:22:21',
            ),
            201 => 
            array (
                'id' => 204,
                'name' => 'Sudán del Sur',
                'countryCode' => 'SSD',
                'iso2' => 'SS',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:22:21',
            ),
            202 => 
            array (
                'id' => 205,
                'name' => 'España',
                'countryCode' => 'ESP',
                'iso2' => 'ES',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:22:21',
            ),
            203 => 
            array (
                'id' => 206,
                'name' => 'Sri lanka',
                'countryCode' => 'LKA',
                'iso2' => 'LK',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:22:21',
            ),
            204 => 
            array (
                'id' => 207,
                'name' => 'Sudán',
                'countryCode' => 'SDN',
                'iso2' => 'SD',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:22:21',
            ),
            205 => 
            array (
                'id' => 208,
                'name' => 'Surinám',
                'countryCode' => 'SUR',
                'iso2' => 'SR',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:22:21',
            ),
            206 => 
            array (
                'id' => 209,
                'name' => 'Svalbard y Jan Mayen',
                'countryCode' => 'SJM',
                'iso2' => 'SJ',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:22:21',
            ),
            207 => 
            array (
                'id' => 210,
                'name' => 'Swazilandia',
                'countryCode' => 'SWZ',
                'iso2' => 'SZ',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:22:21',
            ),
            208 => 
            array (
                'id' => 211,
                'name' => 'Suecia',
                'countryCode' => 'SWE',
                'iso2' => 'SE',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:22:21',
            ),
            209 => 
            array (
                'id' => 212,
                'name' => 'Suiza',
                'countryCode' => 'CHE',
                'iso2' => 'CH',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:22:21',
            ),
            210 => 
            array (
                'id' => 213,
                'name' => 'Siria',
                'countryCode' => 'SYR',
                'iso2' => 'SY',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:22:21',
            ),
            211 => 
            array (
                'id' => 214,
                'name' => 'Taiwán',
                'countryCode' => 'TWN',
                'iso2' => 'TW',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:22:21',
            ),
            212 => 
            array (
                'id' => 215,
                'name' => 'Tadjikistán',
                'countryCode' => 'TJK',
                'iso2' => 'TJ',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:22:21',
            ),
            213 => 
            array (
                'id' => 216,
                'name' => 'Tanzania',
                'countryCode' => 'TZA',
                'iso2' => 'TZ',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:22:21',
            ),
            214 => 
            array (
                'id' => 217,
                'name' => 'Tailandia',
                'countryCode' => 'THA',
                'iso2' => 'TH',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:22:21',
            ),
            215 => 
            array (
                'id' => 218,
                'name' => 'Togo',
                'countryCode' => 'TGO',
                'iso2' => 'TG',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:22:21',
            ),
            216 => 
            array (
                'id' => 219,
                'name' => 'Tokelau',
                'countryCode' => 'TKL',
                'iso2' => 'TK',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:22:21',
            ),
            217 => 
            array (
                'id' => 220,
                'name' => 'Tonga',
                'countryCode' => 'TON',
                'iso2' => 'TO',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:22:21',
            ),
            218 => 
            array (
                'id' => 221,
                'name' => 'Trinidad y Tobago',
                'countryCode' => 'TTO',
                'iso2' => 'TT',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:22:21',
            ),
            219 => 
            array (
                'id' => 222,
                'name' => 'Tunez',
                'countryCode' => 'TUN',
                'iso2' => 'TN',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:22:21',
            ),
            220 => 
            array (
                'id' => 223,
                'name' => 'Turquía',
                'countryCode' => 'TUR',
                'iso2' => 'TR',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:22:21',
            ),
            221 => 
            array (
                'id' => 224,
                'name' => 'Turkmenistán',
                'countryCode' => 'TKM',
                'iso2' => 'TM',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:22:21',
            ),
            222 => 
            array (
                'id' => 225,
                'name' => 'Islas Turcas y Caicos',
                'countryCode' => 'TCA',
                'iso2' => 'TC',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:22:21',
            ),
            223 => 
            array (
                'id' => 226,
                'name' => 'Tuvalu',
                'countryCode' => 'TUV',
                'iso2' => 'TV',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:22:21',
            ),
            224 => 
            array (
                'id' => 227,
                'name' => 'Uganda',
                'countryCode' => 'UGA',
                'iso2' => 'UG',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:22:21',
            ),
            225 => 
            array (
                'id' => 228,
                'name' => 'Ucrania',
                'countryCode' => 'UKR',
                'iso2' => 'UA',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:22:21',
            ),
            226 => 
            array (
                'id' => 229,
                'name' => 'Emiratos Árabes Unidos',
                'countryCode' => 'ARE',
                'iso2' => 'AE',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:22:21',
            ),
            227 => 
            array (
                'id' => 230,
                'name' => 'Reino Unido',
                'countryCode' => 'GBR',
                'iso2' => 'GB',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:22:21',
            ),
            228 => 
            array (
                'id' => 231,
                'name' => 'Estados Unidos de América',
                'countryCode' => 'USA',
                'iso2' => 'US',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:22:21',
            ),
            229 => 
            array (
                'id' => 232,
                'name' => 'Islas Ultramarinas Menores de Estados Unidos',
                'countryCode' => 'UMI',
                'iso2' => 'UM',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:22:21',
            ),
            230 => 
            array (
                'id' => 233,
                'name' => 'Uruguay',
                'countryCode' => 'URY',
                'iso2' => 'UY',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:22:21',
            ),
            231 => 
            array (
                'id' => 234,
                'name' => 'Uzbekistán',
                'countryCode' => 'UZB',
                'iso2' => 'UZ',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:22:21',
            ),
            232 => 
            array (
                'id' => 235,
                'name' => 'Vanuatu',
                'countryCode' => 'VUT',
                'iso2' => 'VU',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:22:21',
            ),
            233 => 
            array (
                'id' => 236,
                'name' => 'Ciudad del Vaticano',
                'countryCode' => 'VAT',
                'iso2' => 'VA',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:22:21',
            ),
            234 => 
            array (
                'id' => 237,
                'name' => 'Venezuela',
                'countryCode' => 'VEN',
                'iso2' => 'VE',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:22:21',
            ),
            235 => 
            array (
                'id' => 238,
                'name' => 'Vietnam',
                'countryCode' => 'VNM',
                'iso2' => 'VN',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:22:21',
            ),
            236 => 
            array (
                'id' => 239,
                'name' => 'Islas Vírgenes Británicas',
                'countryCode' => 'VG',
                'iso2' => 'VG',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:22:21',
            ),
            237 => 
            array (
                'id' => 240,
                'name' => 'Islas Vírgenes de los Estados Unidos',
                'countryCode' => 'VIR',
                'iso2' => 'VI',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:22:21',
            ),
            238 => 
            array (
                'id' => 241,
                'name' => 'Wallis y Futuna',
                'countryCode' => 'WLF',
                'iso2' => 'WF',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:22:21',
            ),
            239 => 
            array (
                'id' => 242,
                'name' => 'Sahara Occidental',
                'countryCode' => 'ESH',
                'iso2' => 'EH',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:22:21',
            ),
            240 => 
            array (
                'id' => 243,
                'name' => 'Yemen',
                'countryCode' => 'YEM',
                'iso2' => 'YE',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:22:22',
            ),
            241 => 
            array (
                'id' => 245,
                'name' => 'Zambia',
                'countryCode' => 'ZMB',
                'iso2' => 'ZM',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:23:41',
            ),
            242 => 
            array (
                'id' => 246,
                'name' => 'Zimbabue',
                'countryCode' => 'ZWE',
                'iso2' => 'ZW',
                'isActive' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-03-08 14:23:41',
            ),
        ));
        
        
    }
}