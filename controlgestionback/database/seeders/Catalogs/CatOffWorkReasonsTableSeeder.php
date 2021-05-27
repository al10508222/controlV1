<?php

namespace Database\Seeders\Catalogs;

use App\Models\Catalogs\CatOffWorkReason;
use Illuminate\Database\Seeder;

class CatOffWorkReasonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CatOffWorkReason::create([
            'id'                => 1,
            'name'              => 'Renuncia',
        ]);
        CatOffWorkReason::create([
            'id'                => 2,
            'name'              => 'Jubilación',
        ]);
        CatOffWorkReason::create([
            'id'                => 3,
            'name'              => 'Muerte',
        ]);
        CatOffWorkReason::create([
            'id'                => 4,
            'name'              => 'Incapacidad',
        ]);
        CatOffWorkReason::create([
            'id'                => 5,
            'name'              => 'Invalidez',
        ]);
    }
}
