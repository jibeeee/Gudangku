<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('supplier')->insert([
        [
            'namaSupplier' => 'LG Technologies',
            'alamatSupplier' => 'Jl Pahlawan Jaya Baru',
            'nomorSupplier' => '081234356789'
        ],
        [
            'namaSupplier' => 'Siplho Corporate',
            'alamatSupplier' => 'Jl Gebang Keputih',
            'nomorSupplier' => '6666666666'
        ]]);

        DB::table('inventory')->insert([
        [
            'namaBarang' => 'TV 51"',
            'quantity' => '10',
            'dimension' => '50',
            'id_supplier' => '1'
        ],
        [
            'namaBarang' => 'TV Android 49"',
            'quantity' => '66',
            'dimension' => '47',
            'id_supplier' => '2'
        ]]);

    }
}
