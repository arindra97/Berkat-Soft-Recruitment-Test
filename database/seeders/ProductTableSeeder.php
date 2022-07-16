<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product =
            [
                [
                    'name'          => 'Hidrococo',
                    'type'          => 'Minuman',
                    'photo'         => 'assets/product/JeCE7oU7aWoSV0okQT2YUYvJDEU8V7Vt9LyBFmgg.png',
                    'qty'           => '100',
                    'price'         => '6000',
                    'created_at'    => date('Y-m-d H:i:s'),
                    'updated_at'    => date('Y-m-d H:i:s'),
                ],
                [
                    'name'          => 'Pocary Sweat',
                    'type'          => 'Minuman',
                    'photo'         => 'assets/product/1pgdO1xBOum30X3ZSECp3dofYbE3xsB4ToukXinX.jpg',
                    'qty'           => '50',
                    'price'         => '7000',
                    'created_at'    => date('Y-m-d H:i:s'),
                    'updated_at'    => date('Y-m-d H:i:s'),
                ],
                [
                    'name'          => 'Kusuka',
                    'type'          => 'Makanan',
                    'photo'         => 'assets/product/BhSwvuCvxPy7lvC43XePGLZLKpfmzmmH5D8TXUjJ.jpg',
                    'qty'           => '30',
                    'price'         => 7000,
                    'created_at'    => date('Y-m-d H:i:s'),
                    'updated_at'    => date('Y-m-d H:i:s'),
                ]
            ];

        Product::insert($product);
    }
}
