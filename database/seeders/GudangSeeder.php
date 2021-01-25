<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GudangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('users')->insert([
            [
                'name' => 'Moch Yusuf Fathussalam',
                'email' => 'yusuf@id.com',
                'password' => 'yusuf2332'
            ],
            [
                'name' => 'Roy Satrio Aji',
                'email' => 'roy@id.com',
                'password' => 'roy2332'
            ]
            ]);

            DB::table('supplier')->insert([
            [
                'namaSupplier' => 'LG Technologies',
                'alamatSupplier' => 'Jl Pahlawan Jaya Baru',
                'nomorSupplier' => '081234356789',
                'id_user' => '1'
            ],
            [
                'namaSupplier' => 'Siplho Corporate',
                'alamatSupplier' => 'Jl Gebang Keputih',
                'nomorSupplier' => '6666666666',
                'id_user' => '2'
            ]]);

            DB::table('barang')->insert([
            [
                'namaBarang' => 'TV Yusuf 51"',
                'dimension' => '50',
                'id_supplier' => '1',
                'id_user' => '1'
            ],
            [
                'namaBarang' => 'TV Roy 49"',
                'dimension' => '47',
                'id_supplier' => '2',
                'id_user' => '2'
            ]]);

            DB::table('inventory')->insert([
                [
                    'quantity' => '66',
                    'id_barang' => '1',
                    'id_user' => '1'
                ],
                [
                    'quantity' => '99',
                    'id_barang' => '2',
                    'id_user' => '2'
                ]]);

            DB::table('activity')->insert([
                [
                    'value_quantity' => '4',
                    'value_activity' => '1',
                    'id_barang' => '1',
                    'id_user' => '1'
                ],
                [
                    'value_quantity' => '9',
                    'value_activity' => '0',
                    'id_barang' => '2',
                    'id_user' => '2'
                ]]);
    }
}

