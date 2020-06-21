@extends('cms.layouts.default')
@section('content')
    <div class="container">
        <div class="row justify-content-between align-items-center mb-3">
            <div class="col-md-auto">
                <h3 class="mb-0">Nova Imagem</h3>
            </div>
            <div class="col-md-auto">
                <a href="{{ route('admin.carousel.index') }}" class="btn btn-success">
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
        <form action="{{ route('admin.carousel.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-12 col-xs-12 col-md-12">
                    <div class="form-group">
                        <strong>Título da imagem:</strong>
                        <input type="text" name="titulo" class="form-control" placeholder="Digite o título aqui...">
                    </div>
                </div>
                <div class="col-sm-12 col-xs-12 col-md-12">
                    <div class="form-group">
                        <strong>Subtítulo da imagem:</strong>
                        <input type="text" name="subtitulo" class="form-control" placeholder="Digite o título aqui...">
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header">Carregue uma imagem:</div>
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
                                <strong>Imagem:</strong>
                                <input type="file" name="imagem" id="images" class="form-control-file">
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