<?php

use Illuminate\Database\Seeder;
use App\Equipamento;

class EquipamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $equipamentos = [
            'Ar', 'Direção Hidráulica', 'CD', 'Alarme',
            'Trava Elétrica', 'Vidro Elétrico', 'Direção Elétrica',
            'Aerofólio', 'Air Bag', 'Air Bag Duplo',
		    'Antena Elétrica', 'Ar Quente', 'Banco Elétrico', 'Bancos em Couro',
            'Basculante', 'Básico', 'Baú', 'Blindagem',	'Bluetooth', 'Botão Start',
            'Câmbio Automático', 'Câmbio Automático (CVT)', 'Câmbio Automático Hidramático',
            'Câmbio Borboleta', 'Câmera de Ré', 'Capota de Fibra', 'Capota Marítima',
            'Carroceria Estendida', 'CD Player com MP3', 'Chave Canivete',
		    'Computador de Bordo', 'ContaGiro',	'Controle de Estabilidade', 'Controle de Som no Volante',
		    'Controle de Tração', 'Desembaçador Traseiro',
            'Disqueteira', 'DVD Player', 'Engate', 'Espelhos Elétricos',
            'Estribo', 'Farol de Milha', 'Farol de Neblina', 'Freio a Ar', 'Freio a Disco', 
            'Freio ABS', 'GPS', 'Graneleiro', 'HDD', 'Indicador de Marchas', 'Interclima',
            'Intercooler', 'Kit Multimídia', 'Kit Visibilidade', 'Limpador Traseiro', 'Media Nav',
            'MyLink', 'Park Assist', 'Partida Elétrica', 'Pedaleira Esportiva', 'Pelicula Protetora',
            'Piloto Automático', 'Porta Malas Elétrico', 'Protetor de Caçamba', 'Protetor de Cárter',
            'Protetor de Escapamentos', 'Quebra-Mato', 'Rastreador', 'Retrovisor Elétrico',
            'Rodas de Liga Leve', 'Santo Antônio', 'Sensor Crepuscular', 'Sensor de Chuva',
            'Sensor de Estacionamento', 'Suspensão a Ar', 'Tacógrafo', 'Tapetes de Alumínio',
            'Teto Solar', 'Truck', 'Turbo', 'TV Digital', 'USB', 'Volante Escamoteável',
            'Volante Esportivo', 'Xenon'
        ];

        foreach($equipamentos as $equipamento)
        {
            Equipamento::create([
                'nome' => $equipamento
            ]);
        }
    }
}
