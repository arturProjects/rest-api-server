<?php

use Illuminate\Database\Seeder;
use App\Item;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 50; $i++) {
            Item::create([
                'name' => 'Produkt '.$i,
                'amount' => mt_rand(0, 100)
                ]);
        }
    }
}
