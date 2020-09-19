<?php

namespace Database\Seeders;

use App\Models\Products;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { $productsTable=new Products();
        $products=[];
       for ($i=1; $i < 13; $i++) {

            $products[]=[

                    'id'=>$i,
                    'name'=>'pizza'.$i,
                    'ingreadiants'=>'ingreadiants'.$i,
                    'price'=>rand(0,50),
                    'image'=>'/img/pizza'.$i.'.png'

            ];
    }
    foreach ($products as $product) {
        $productsTable::create($product);
    }
    }
}
