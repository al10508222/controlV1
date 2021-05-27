<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Catalogs\CatMonth;

class CatMonthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $month = new CatMonth();
        $month->name = 'Enero';
        $month->save();

        $month = new CatMonth();
        $month->name = 'Febrero';
        $month->save();

        $month = new CatMonth();
        $month->name = 'Marzo';
        $month->save();

        $month = new CatMonth();
        $month->name = 'Abril';
        $month->save();

        $month = new CatMonth();
        $month->name = 'Mayo';
        $month->save();

        $month = new CatMonth();
        $month->name = 'Junio';
        $month->save();

        $month = new CatMonth();
        $month->name = 'Julio';
        $month->save();

        $month = new CatMonth();
        $month->name = 'Agosto';
        $month->save();

        $month = new CatMonth();
        $month->name = 'Septiembre';
        $month->save();

        $month = new CatMonth();
        $month->name = 'Octubre';
        $month->save();

        $month = new CatMonth();
        $month->name = 'Noviembre';
        $month->save();

        $month = new CatMonth();
        $month->name = 'Diciembre';
        $month->save();
    }
}
