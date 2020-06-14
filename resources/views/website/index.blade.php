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
                                    <option value="MT">Fiat</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <select name="modelo" class="form-control" id="modelos_select">
                                    <option disabled selected>Modelo</option>
                                    <option value="MT">Uno</option>
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
                                    <option value="MT">2008</option>
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
                    <div class="col">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="row justify-content-center align-items-center">
                                    {{-- Titulo --}}
                                    <div class="col-md-auto">
                                        <h5 class="card-title"><strong>Lorem ipsum</strong></h5>
                                    </div>
                                </div>
                                <div class="row">
                                    {{-- Imagem --}}
                                    <div class="col-md-auto">
                                        <img class="card-img-top h-100 lazy img-fluid" src="{{ asset('resources/images/card-car.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="row">
                                    {{-- Dados do Carro --}}
                                    <div class="col">
                                        <div class="row justify-content-center align-items-center mt-3">
                                            {{-- Preço --}}
                                            <div class="col-md-auto">
                                                <p><strong>R$ XX.XXX,XX</strong></p>
                                            </div>
                                        </div>
                                        <p class="card-text mb-2"><strong>Ano: </strong>20XX</p>
                                        <p class="card-text mb-2"><strong>Local: </strong>Cuiabá-MT</p>
                                        <p class="card-text mb-4"><strong>Quilometragem: </strong>XXXX km</p>
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
                    <div class="col">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="row justify-content-center align-items-center">
                                    {{-- Titulo --}}
                                    <div class="col-md-auto">
                                        <h5 class="card-title"><strong>Lorem ipsum</strong></h5>
                                    </div>
                                </div>
                                <div class="row">
                                    {{-- Imagem --}}
                                    <div class="col-md-auto">
                                        <img class="card-img-top h-100 lazy img-fluid" src="{{ asset('resources/images/card-car.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="row">
                                    {{-- Dados do Carro --}}
                                    <div class="col">
                                        <div class="row justify-content-center align-items-center mt-3">
                                            {{-- Preço --}}
                                            <div class="col-md-auto">
                                                <p><strong>R$ XX.XXX,XX</strong></p>
                                            </div>
                                        </div>
                                        <p class="card-text mb-2"><strong>Ano: </strong>20XX</p>
                                        <p class="card-text mb-2"><strong>Local: </strong>Cuiabá-MT</p>
                                        <p class="card-text mb-4"><strong>Quilometragem: </strong>XXXX km</p>
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
                    <div class="col">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="row justify-content-center align-items-center">
                                    {{-- Titulo --}}
                                    <div class="col-md-auto">
                                        <h5 class="card-title"><strong>Lorem ipsum</strong></h5>
                                    </div>
                                </div>
                                <div class="row">
                                    {{-- Imagem --}}
                                    <div class="col-md-auto">
                                        <img class="card-img-top h-100 lazy img-fluid" src="{{ asset('resources/images/card-car.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="row">
                                    {{-- Dados do Carro --}}
                                    <div class="col">
                                        <div class="row justify-content-center align-items-center mt-3">
                                            {{-- Preço --}}
                                            <div class="col-md-auto">
                                                <p><strong>R$ XX.XXX,XX</strong></p>
                                            </div>
                                        </div>
                                        <p class="card-text mb-2"><strong>Ano: </strong>20XX</p>
                                        <p class="card-text mb-2"><strong>Local: </strong>Cuiabá-MT</p>
                                        <p class="card-text mb-4"><strong>Quilometragem: </strong>XXXX km</p>
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
                </div>
                <div class="row ver-mais justify-content-center align-items-center mt-3">
                    <div class="col-md-auto">
                        <button class="btn btn-danger">
                            Ver Mais ...
                        </button>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection