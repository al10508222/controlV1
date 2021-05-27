<?php

namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert(
            [
                [
                    'id'                => 1,
                    'username'          =>'marcosp',
                    'password'          => Hash::make('12345678'),
                    'email'             =>'mpineirov1@gmail.com',
                    'profile_id'        => 1,
                    'name'              => 'Marcos',
                    'last_name'         => 'Piñeiro',
                    'second_lastname'   => 'Villegas',
                    'active'            => 1,
                    'created_at'        => Carbon::now(),
                    'updated_at'        => Carbon::now(),
                ],
                [
                    'id'                => 2,
                    'username'          =>'cristian.banos',
                    'password'          => Hash::make('12345678'),
                    'email'             =>'cristian.banos@infotec.mx',
                    'profile_id'        => 1,
                    'name'              => 'Cristian',
                    'last_name'         => 'Baños',
                    'second_lastname'   => 'ASDFGHIJK',
                    'active'            => 1,
                    'created_at'        => Carbon::now(),
                    'updated_at'        => Carbon::now(),
                ],    
                [
                    'id'                => 3,
                    'username'          =>'brandon.perez',
                    'password'          => Hash::make('12345678'),
                    'email'             =>'brandon.perez@infotec.mx',
                    'profile_id'        => 3,
                    'name'              => 'Brandon',
                    'last_name'         => 'Perez',
                    'second_lastname'   => 'Ramírez',
                    'active'            => 1,
                    'created_at'        => Carbon::now(),
                    'updated_at'        => Carbon::now(),
                ],
                [
                    'id'                => 4,
                    'username'          =>'luis',
                    'password'          => Hash::make('12345678'),
                    'email'             =>'luis.perez@infotec.mx',
                    'profile_id'        => 4,
                    'name'              => 'Luis',
                    'last_name'         => 'Tierrafria',
                    'second_lastname'   => '',
                    'active'            => 1,
                    'created_at'        => Carbon::now(),
                    'updated_at'        => Carbon::now(),
                ],
                [
                    'id'                => 5,
                    'username'          =>'jorge.alberto',
                    'password'          => Hash::make('87654321'),
                    'email'             =>'jorealberto@gmail.com',
                    'profile_id'        => 5,
                    'name'              => 'Jorge',
                    'last_name'         => 'Alberto',
                    'second_lastname'   => '',
                    'active'            => 1,
                    'created_at'        => Carbon::now(),
                    'updated_at'        => Carbon::now(),
                ],
                /*
                [
                    'id'                => 5,
                    'username'          =>'steve.jobs',
                    'password'          => Hash::make('12345678'),
                    'email'             =>'steve.jobs@apple.com',
                    'profile_id'        => 1,
                    'name'              => 'Steve',
                    'last_name'         => 'Jobs',
                    'second_lastname'   => '',
                    'active'            => 1,
                    'created_at'        => Carbon::now(),
                    'updated_at'        => Carbon::now(),
                ],
                */
           ]
        );
        \DB::statement('ALTER SEQUENCE public.users_id_seq RESTART WITH 6');
    }
}
