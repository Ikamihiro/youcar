@extends('cms.layouts.default')

@section('content')
    <div class="container">
        <div class="row justify-content-between align-items-center mb-3">
            <div class="col-md-auto">
                <h3 class="mb-0">Editar Veículo</h3>
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
        <form action="{{ route('admin.veiculos.update', $veiculo->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-sm-12 col-xs-12 col-md-12">
                    <div class="form-group">
                        <strong>Modelo do Veículo:</strong>
                        <input type="text" name="modelo" value="{{ $veiculo->modelo }}" class="form-control" placeholder="Digite o nome do modelo...">
                    </div>
                </div>
                <div class="col-sm-12 col-xs-12 col-md-12">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <strong>Marca:</strong>
                                <select name="marca_id" id="marca_id" class="form-control">
                                    <option disabled>Selecione uma marca</option>
                                    @foreach ($marcas as $marca)
                                        <option value="{{ $marca->id }}" {{ ($marca->id == $veiculo->marca_id) ? 'selected' : '' }}>
                                            {{ $marca->nome }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <strong>Valor/Preço:</strong>
                                <input type="text" name="valor" value="{{ $veiculo->valor }}" class="form-control" placeholder="Digite o valor...">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-xs-12 col-md-12">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <strong>Quilometragem:</strong>
                                <input type="number" name="quilometragem" value="{{ $veiculo->quilometragem }}" class="form-control" placeholder="Digite a quilometragem ...">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <strong>Transmissão:</strong>
                                <select name="transmissao" id="transmissao" class="form-control">
                                    <option disabled>Selecione a transmissão</option>
                                    @foreach($transmissoes as $transmissao)
                                        <option value="{{ $transmissao }}" {{ ($transmissao == $veiculo->transmissao) ? 'selected' : '' }}>
                                            {{ $transmissao }}
                                        </option>
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
                                    <option disabled>Selecione a condição</option>
                                    @foreach($condicoes as $condicao)
                                        <option value="{{ $condicao }}" {{ ($condicao == $veiculo->condicao) ? 'selected' : '' }}>
                                            {{ $condicao }}
                                        </option>
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
                                        <option value="{{ $combustivel }}" {{ ($combustivel == $veiculo->combustivel) ? 'selected' : '' }}>
                                            {{ $combustivel }}
                                        </option>
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
                                <input type="number" name="ano" value="{{ $veiculo->ano }}" class="form-control" placeholder="Digite o ano do veículo ...">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <strong>Cor:</strong>
                                <input type="text" name="cor" value="{{ $veiculo->cor }}" class="form-control" placeholder="Digite a cor do veículo ...">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-xs-12 col-md-12">
                    <div class="form-group">
                        <strong>Detalhes:</strong>
                        <textarea name="detalhes" id="detalhes" class="form-control">{{ $veiculo->detalhes }}</textarea>
                    </div>
                </div>
                <div class="col-sm-12 col-xs-12 col-md-12">
                    <div class="form-group">
                        <div class="form-group">
                            <strong>Selecione a imagem principal do véiculo:</strong>
                            <input type="file" name="imagemCapa" id="imagem" class="form-control-file">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header">Selecione somente as imagens da galeria que deseja excluir</div>
                <div class="card-body">
                    <div id="gallery-delete">
                        @foreach ($veiculo->imagens as $imagem)
                            <a>
                                <input name="deleteImages[]" style="position: absolute; z-index: 2" 
                                value="{{ $imagem->id }}" type="checkbox">
                                <img src="{{ asset($imagem->path) }}" id="img{{ md5($imagem->id) }}">
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header">Carregue outras imagens para a galeria do veículo</div>
                <div class="card-body">
                    <div id="images_preview"></div>
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
