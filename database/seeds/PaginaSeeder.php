<?php

use Illuminate\Database\Seeder;
use App\Pagina;

class PaginaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $primeiroParagrafo = '<p>Atuando no mercado de compra e venda de veículos na cidade de Várzea Grande/MT, a You Car Multimarcas vem construindo com muito trabalho a sua história de sucesso. Mais que comprar e vender automóveis, a You Car presa pela melhoria contínua de seus serviços, visando sempre o melhor negócio para seus clientes.</p>';

        $segundoParagrafo = '<p>Seriedade, agilidade, procedência, veículos de extrema qualidade e satisfação do cliente: este conjunto de desafios, renovados a cada dia, consolida o sucesso da Empresa. Seja na compra ou na venda, você entra com a sua expectativa e sai com a satisfação garantida.</p>';

        $terceiroParagrafo = '<p>Todos nossos veículos são revisados criteriosamente, possibilitando dar aos nossos clientes tranquilidade na hora da compra.</p>';
        
        $quartoParagrafo = '<p>Esta é a filosofia de trabalho que você encontra na You Car Multimarcas, uma empresa digna para um perfeito atendimento desde a aquisição até a entrega do seu veículo.</p>';
        
        $quintoParagrafo = '<p>Esta é a filosofia de trabalho que você encontra na You Car Multimarcas, uma empresa digna para um perfeito atendimento desde a aquisição até a entrega do seu veículo.</p>';

        //factory(\App\Pagina::class, 3)->create();
        Pagina::create([
            'titulo' => 'Sobre',
            'subtitulo' => 'Quem somos nós',
            'conteudo' => $primeiroParagrafo . $segundoParagrafo . $terceiroParagrafo . $quartoParagrafo . $quintoParagrafo,
            'slug' => 'sobre'
        ]);
    }
}
