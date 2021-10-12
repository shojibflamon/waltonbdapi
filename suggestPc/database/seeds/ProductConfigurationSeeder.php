<?php

use App\ProductConfigurations;
use Illuminate\Database\Seeder;

class ProductConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $grades = config('productconfig.grade');

        foreach ($grades as $grade){
            $data = [
                'grade' => $grade,
                'options' => json_encode(config('productconfig.options.'.$grade)),
                'products' => json_encode(config('productconfig.products.'.$grade)),
            ];
            ProductConfigurations::create($data);
        }
    }
}
