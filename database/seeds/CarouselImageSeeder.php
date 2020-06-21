<?php

use Illuminate\Database\Seeder;

class CarouselImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\CarouselImage::class, 5)->create();
    }
}
