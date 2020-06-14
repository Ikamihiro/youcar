@extends('website.layouts.default')

@section('content')
    <main>
        @include('website.partials.carousel')
        <section class="filtro-carros bg-secondary py-5">
            <div class="container-lg">
                <form action="{{ route('root') }}">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-md-2">
                            <div class="form-group">
                                <select name="marca" class="form-control" id="marcas_select">
                                    <option disabled selected>Marca</option>
                                    @foreach ($marcas as $marca)
                                        <option value="{{ $marca->id }}">{{ $marca->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <select name="modelo" class="form-control" id="modelos_select">
                                    <option disabled selected>Modelo</option>
                                    @foreach ($modelos as $item)
                                        <option value="{{ $item->nome }}">{{ $item->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <select name="preco" class="form-control" id="precos_select">
                                    <option disabled selected>Preço</option>
                                    <option value="MT">Menor que R$ 50.000,00</option>
                                    <option value="MT">Entre R$ 50.000,00 e R$ 100.000,00</option>
                                    <option value="MT">Maior que R$ 100.000,00</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <select name="ano" class="form-control" id="anos_select">
                                    <option disabled selected>Ano</option>
                                    @foreach ($modelos as $item)
                                        <option value="{{ $item->ano }}">{{ $item->ano }}</option>
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
        <section class="card-carros">
            <div class="container-lg">
                <div class="row">
                    @foreach ($veiculos as $veiculo)
                        <div class="col">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="row justify-content-center align-items-center">
                                        {{-- Titulo --}}
                                        <div class="col-md-auto">
                                            <h5 class="card-title"><strong>{{ $veiculo->nome }}</strong></h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        {{-- Imagem --}}
                                        <div class="col-md-auto">
                                            @foreach ($veiculo->imagens as $imagem)
                                                @if ($loop->first)
                                                    <img class="card-img-top img-fluid" src="{{ asset($imagem->path) }}" alt="">
                                                @endif
                                            @endforeach
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
                                            <a href="{{ route('root') }}" class="btn btn-link">
                                                Estou interessado
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>   
                    @endforeach               
                </div>
                <div class="row ver-mais justify-content-center align-items-center mt-3">
                    <div class="col-md-auto">
                        {!! $veiculos->links() !!}
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection