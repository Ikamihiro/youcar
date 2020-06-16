<?php

use Illuminate\Database\Seeder;
use App\Marca;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $marcas = [
            'Aston Martin', 'Audi',
            'Bentley', 'BMW', 'Caoa Chery',
            'Chevrolet', 'Chrysler', 'Citroën',
            'Dodge', 'Ferrari', 'Fiat', 'Ford',
            'Honda', 'Hyundai', 'JAC', 'Jaguar',
            'Jeep', 'Kia', 'Lamborghini', 'Land Rover',
            'Lexus', 'Lifan', 'Maserati', 'Mercedes-Benz',
            'Mini', 'Mitsubishi', 'Nissan', 'Peugeot',
            'Porsche', 'Renault', 'Smart', 'Subaru',
            'Suzuki', 'Toyota', 'Triumph', 'VolksWagen',
            'Volvo', 'Yamaha'
        ];

        foreach($marcas as $marca) {
            Marca::create([
                'nome' => $marca
            ]);
        }
    }
}
