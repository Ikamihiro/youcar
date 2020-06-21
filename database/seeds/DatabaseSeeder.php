<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(MarcaSeeder::class);
        $this->call(EquipamentoSeeder::class);
        $this->call(CarouselImageSeeder::class);
        $this->call(PaginaSeeder::class);
    }
}
