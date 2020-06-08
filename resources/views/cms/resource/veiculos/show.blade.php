@extends('cms.layouts.default')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="row justify-content-between align-items-center mb-3">
                    <div class="col-md-auto">
                        <h3 class="mb-0">Novo Veículo</h3>
                    </div>
                    <div class="col-md-auto">
                        <a href="{{ route('admin.veiculos.index') }}" class="btn btn-success">
                            Voltar
                        </a>
                    </div>
                </div>
                <div class="card">
                    <h4 class="card-header">Veículo {{ $veiculo->nome }}</h4>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <p class="card-text"><strong>Marca: </strong></p>
                            </div>
                            <div class="col-6">
                                <p class="card-text">{{ $veiculo->marca->nome }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p class="card-text"><strong>Valor: </strong></p>
                            </div>
                            <div class="col-6">
                                <p class="card-text">R$ {{ $veiculo->valor }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p class="card-text"><strong>Quilometragem: </strong></p>
                            </div>
                            <div class="col-6">
                                <p class="card-text">{{ $veiculo->quilometragem }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p class="card-text"><strong>Transmissão: </strong></p>
                            </div>
                            <div class="col-6">
                                <p class="card-text">{{ $veiculo->transmissao }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p class="card-text"><strong>Combustível: </strong></p>
                            </div>
                            <div class="col-6">
                                <p class="card-text">
                                    {{ $veiculo->combustivel }}
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p class="card-text"><strong>Condição: </strong></p>
                            </div>
                            <div class="col-6">
                                <p class="card-text">{{ $veiculo->condicao }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p class="card-text"><strong>Ano: </strong></p>
                            </div>
                            <div class="col-6">
                                <p class="card-text">{{ $veiculo->ano }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p class="card-text"><strong>Cor: </strong></p>
                            </div>
                            <div class="col-6">
                                <p class="card-text">{{ $veiculo->cor }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p class="card-text"><strong>Detalhes: </strong></p>
                            </div>
                            <div class="col-6">
                                <p class="card-text">{{ $veiculo->detalhes }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection