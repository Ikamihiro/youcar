@extends('cms.layouts.default')

@section('content')
    <div class="container">
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
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Opa!</strong> Os dados inseridos estão errados ou vazios.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.veiculos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-12 col-xs-12 col-md-12">
                    <div class="form-group">
                        <strong>Modelo do Veículo:</strong>
                        <input type="text" name="modelo" class="form-control" placeholder="Digite o nome do modelo...">
                    </div>
                </div>
                <div class="col-sm-12 col-xs-12 col-md-12">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <strong>Marca:</strong>
                                <select name="marca_id" id="marca_id" class="form-control">
                                    <option disabled selected>Selecione uma marca</option>
                                    @foreach ($marcas as $marca)
                                        <option value="{{ $marca->id }}">{{ $marca->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <strong>Valor/Preço:</strong>
                                <input type="text" name="valor" class="form-control" placeholder="Digite o valor...">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-xs-12 col-md-12">
                    <div class="row">
                        <div class="col">
                            <strong>Selecione os equipamentos desejados:</strong>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <select class="custom-select" id="equipamentosFonte" multiple size="10">
                                    <option disabled selected></option>
                                    @foreach ($equipamentos as $equipamento)
                                        <option value="{{ $equipamento->id }}">
                                            {{ $equipamento->nome }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-auto">
                            <div class="form-group">
                                <div class="row mb-2">
                                    <div class="col">
                                        <button type="button" id="adicionarEquipamento" class="btn btn-primary">
                                            Adicionar
                                        </button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <button type="button" id="removerEquipamento" class="btn btn-primary">
                                            Remover
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <select multiple="multiple" name="equipamentos[]" class="custom-select" id="equipamentosSelecionados" size="10">
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-xs-12 col-md-12">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <strong>Quilometragem:</strong>
                                <input type="number" name="quilometragem" class="form-control" placeholder="Digite a quilometragem ...">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <strong>Transmissão:</strong>
                                <select name="transmissao" id="transmissao" class="form-control">
                                    <option disabled selected>Selecione a transmissão</option>
                                    @foreach($transmissoes as $transmissao)
                                        <option value="{{ $transmissao }}">{{ $transmissao }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-xs-12 col-md-12">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <strong>Condição:</strong>
                                <select name="condicao" id="condicao" class="form-control">
                                    <option disabled selected>Selecione a condição</option>
                                    @foreach($condicoes as $condicao)
                                        <option value="{{ $condicao }}">{{ $condicao }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <strong>Combustível:</strong>
                                <select name="combustivel" id="combustivel" class="form-control">
                                    <option disabled selected>Selecione o combustivel</option>
                                    @foreach($combustiveis as $combustivel)
                                        <option value="{{ $combustivel }}">{{ $combustivel }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-xs-12 col-md-12">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <strong>Ano:</strong>
                                <input type="number" name="ano" class="form-control" placeholder="Digite o ano do veículo ...">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <strong>Cor:</strong>
                                <input type="text" name="cor" class="form-control" placeholder="Digite a cor do veículo ...">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-xs-12 col-md-12">
                    <div class="form-group">
                        <strong>Detalhes:</strong>
                        <textarea name="detalhes" id="detalhes" class="form-control"></textarea>
                    </div>
                </div>
                <div class="col-sm-12 col-xs-12 col-md-12">
                    <div class="form-group">
                        <strong>Selecione a imagem principal do véiculo:</strong>
                        <input type="file" name="imagemCapa" id="imagem" class="form-control-file">
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header">Carregue outras imagens para a galeria do veículo</div>
                <div class="card-image">
                    <div class="row">
                        <div class="col">
                            <div id="images_preview"></div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12 col-md-12">
                            <div class="form-group">
                                <strong>Imagens:</strong>
                                <input type="file" name="images[]" id="images" class="form-control-file" multiple>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-auto">
                    <button type="submit" class="btn btn-success">
                        Salvar
                    </button>
                </div>
            </div>
        </form>
    </div>    
@endsection
