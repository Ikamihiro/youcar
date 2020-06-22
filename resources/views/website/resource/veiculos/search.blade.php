@extends('website.layouts.default')
@section('content')
    <section class="filtro-carros bg-secondary py-5">
        <div class="container-lg">
            <form action="{{ route('search') }}" method="get">
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-2">
                        <div class="form-group">
                            <select name="marca" class="custom-select" id="marcas_select">
                                <option disabled selected>Marca</option>
                                @foreach ($marcas as $marca)
                                    <option value="{{ $marca->id }}">{{ $marca->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <select name="modelo" class="custom-select" id="modelos_select">
                                <option disabled selected>Modelo</option>
                                @foreach ($modelos as $item)
                                    <option value="{{ $item->modelo }}">{{ $item->modelo }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <select name="preco" class="custom-select" id="precos_select">
                                <option disabled selected>Preço</option>
                                <option value="<50">Menor que R$ 50.000,00</option>
                                <option value="50-100">Entre R$ 50.000,00 e R$ 100.000,00</option>
                                <option value=">100">Maior que R$ 100.000,00</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <select name="ano" class="custom-select" id="anos_select">
                                <option disabled selected>Ano</option>
                                @foreach ($anos as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2 enviar-filtro">
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-search"></i> Encontrar carro
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <div class="container mb-0 mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-auto h5">
                Foram filtrados <strong>{{ $veiculos->count() }}</strong> veículos
            </div>
        </div>
    </div>
    <section class="card-carros">
        <div class="container-lg">
            <div class="row">
                @foreach ($veiculos as $veiculo)
                    <div class="col-12 col-md-4 col-lg-4 col-xl-4 mb-3">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="row justify-content-center align-items-center">
                                    {{-- Titulo --}}
                                    <div class="col-md-auto">
                                        <h5 class="card-title">
                                            <strong>{{ $veiculo->modelo }} - 
                                                {{ $veiculo->marca->nome }} - 
                                                {{ $veiculo->ano }}
                                            </strong>
                                        </h5>
                                    </div>
                                </div>
                                <div class="row">
                                    {{-- Imagem --}}
                                    <div class="col-md-auto">
                                        <img class="card-img-top img-fluid" src="{{ url('resize/' . base64_encode(dirname($veiculo->imagem_capa)) . '&350&200&' . basename($veiculo->imagem_capa)) }}" alt="">
                                    </div>
                                </div>
                                <div class="row">
                                    {{-- Dados do Carro --}}
                                    <div class="col">
                                        <div class="row justify-content-center align-items-center mt-3">
                                            {{-- Preço --}}
                                            <div class="col-md-auto">
                                                <p><strong>R$ {{ $veiculo->valor }}</strong></p>
                                            </div>
                                        </div>
                                        <p class="card-text mb-2"><strong>Ano: </strong>{{ $veiculo->ano }}</p>
                                        <p class="card-text mb-2"><strong>Condição: </strong>{{ $veiculo->condicao }}</p>
                                        <p class="card-text mb-4"><strong>Quilometragem: </strong>{{ $veiculo->quilometragem }} km</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                {{-- Ir para detalhes --}}
                                <div class="row justify-content-center align-items-center">
                                    <div class="col-md-auto">
                                        <a href="{{ route('show_veiculo', $veiculo->id) }}" class="btn btn-link">
                                            Estou interessado
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>   
                @endforeach               
            </div>
            <div class="row ver-mais justify-content-center align-items-center">
                <div class="col-md-auto">
                    {!! $veiculos->links() !!}
                </div>
            </div>
        </div>
    </section>
@endsection