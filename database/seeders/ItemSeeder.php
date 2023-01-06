<?php

namespace Database\Seeders;
use App\Models\Item;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 10; $i++){
            $new_item = new Item();
            $new_item->name = $faker->word();
            $new_item->image = $faker->imageUrl(640, 480, 'animals', true);
            $new_item->price = $faker->randomFloat(2, 1, 1000);
            $new_item->description = $faker->text();
            $new_item ->save();
        }
    }
}
