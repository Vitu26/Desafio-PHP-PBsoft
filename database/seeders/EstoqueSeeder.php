<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class EstoqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Product $product): void
    {
        $product::create([
            'name' => 'teste1',
            'description' => 'teste descricão',
            'category' => 'teste',
            'value' => '12.00',
            'quanty' => '6'
        ]);

        $product::create([
            'name' => 'teste2',
            'description' => 'teste descricão2',
            'category' => 'teste',
            'value' => '3.00',
            'quanty' => '2'
        ]);

        $product::create([
            'name' => 'teste3',
            'description' => 'teste descricão3',
            'category' => 'teste',
            'value' => '250.00',
            'quanty' => '2'
        ]);
    }
}
