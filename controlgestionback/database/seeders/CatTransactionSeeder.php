<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CatTransactionTypes;

class CatTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $CatTypeTransaction = new CatTransactionTypes();
        $CatTypeTransaction->name = 'create employee';
        $CatTypeTransaction->isActive = true;
        $CatTypeTransaction->save();

        $CatTypeTransaction = new CatTransactionTypes();
        $CatTypeTransaction->name = 'edit employee';
        $CatTypeTransaction->isActive = true;
        $CatTypeTransaction->save();

        $CatTypeTransaction = new CatTransactionTypes();
        $CatTypeTransaction->name = 'delete employee';
        $CatTypeTransaction->isActive = true;
        $CatTypeTransaction->save();

        // $CatTypeTransaction = new CatTransactionTypes();
        // $CatTypeTransaction->name = '';
        // $CatTypeTransaction->isActive = true;
        // $CatTypeTransaction->save();
    }
}
