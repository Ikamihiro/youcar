@extends('website.layouts.default')
@section('title', 'Veículo')
@section('content')
    <div class="container">
        <div class="card shadow mt-3">
            <div class="card-header bg-secondary h4 text-light">
                <strong>{{ $veiculo->modelo }}</strong> - 
                {{ $veiculo->marca->nome }} - 
                <strong>{{ $veiculo->ano }}</strong>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4 col-xs-4 col-md-4">
                        <div class="row col-sm-12 col-xs-12 col-md-12 mb-3 h5">
                            <strong>Imagens do Veículo</strong>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12 col-md-12 mb-3">
                                <img class="card-img-top img-fluid" 
                                src="{{ asset('storage/'.$veiculo->imagem_capa) }}">
                            </div>
                            @foreach ($veiculo->imagens as $imagem)
                                <div class="col-sm-12 col-xs-12 col-md-12 mb-3">
                                    <img class="img-fluid shadow" 
                                    src="{{ asset($imagem->path) }}" alt="">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-sm-8 col-xs-8 col-md-8">
                        <div class="row col-sm-12 col-xs-12 col-md-12 mb-3 h5">
                            <strong>Informações do Veículo</strong>
                        </div>
                        <dl class="row mb-3">
                            <!-- Dado: Modelo -->
                            <dt class="col-sm-4 h6"><strong>Modelo do Veículo:</strong></dt>
                            <dd class="col-sm-8">{{ $veiculo->modelo }}</dd>
                            <!-- Dado: Marca -->
                            <dt class="col-sm-4 h6"><strong>Marca do Veículo:</strong></dt>
                            <dd class="col-sm-8">{{ $veiculo->marca->nome }}</dd>
                            <!-- Dado: Quilometragem -->
                            <dt class="col-sm-4 h6"><strong>Quilometragem:</strong></dt>
                            <dd class="col-sm-8">{{ $veiculo->quilometragem }}</dd>
                            <!-- Dado: Trasmissão -->
                            <dt class="col-sm-4 h6"><strong>Trasmissão:</strong></dt>
                            <dd class="col-sm-8">{{ $veiculo->transmissao }}</dd>
                            <!-- Dado: Condição -->
                            <dt class="col-sm-4 h6"><strong>Condição:</strong></dt>
                            <dd class="col-sm-8">{{ $veiculo->condicao }}</dd>
                            <!-- Dado: Combustível -->
                            <dt class="col-sm-4 h6"><strong>Combustível:</strong></dt>
                            <dd class="col-sm-8">{{ $veiculo->combustivel }}</dd>
                            <!-- Dado: Ano -->
                            <dt class="col-sm-4 h6"><strong>Ano do Veículo:</strong></dt>
                            <dd class="col-sm-8">{{ $veiculo->ano }}</dd>
                            <!-- Dado: Cor -->
                            <dt class="col-sm-4 h6"><strong>Cor do Veículo:</strong></dt>
                            <dd class="col-sm-8">{{ $veiculo->cor }}</dd>
                        </dl>
                        <div class="row justify-content-center align-items-center mb-3">
                            <div class="col-sm-12 col-xs-12 col-md-12">
                                <div class="jumbotron p-2 bg-primary">
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <h4 class="mb-0 text-white">
                                                Valor Atual: <strong>R$ {{ $veiculo->valor }}</strong>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row col-sm-12 col-xs-12 col-md-12 mb-3 h5">
                            <strong>Equipamentos</strong>
                        </div>
                        <div class="row justify-content-between">
                            @foreach ($veiculo->equipamentos as $equipamento)
                                <div class="col-12 col-md-5 col-lg-5 col-xl-5 mb-3">
                                    <div class="row">
                                        <div class="col-md-auto text-danger">
                                            <i class="fas fa-check"></i>
                                        </div>
                                        <div class="col h6">
                                            <strong>{{ $equipamento->nome }}</strong>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
