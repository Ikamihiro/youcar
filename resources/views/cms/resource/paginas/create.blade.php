@extends('cms.layouts.default')
@section('content')
    <div class="container">
        <div class="row justify-content-between align-items-center mb-3">
            <div class="col-md-auto">
                <h3 class="mb-0">Nova Página</h3>
            </div>
            <div class="col-md-auto">
                <a href="{{ route('admin.paginas.index') }}" class="btn btn-success">
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
        <form action="{{ route('admin.paginas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-12 col-xs-12 col-md-12">
                    <div class="form-group">
                        <strong>Título da página:</strong>
                        <input type="text" name="titulo" value="{{old('titulo')}}" class="form-control" placeholder="Digite o título da página...">
                    </div>
                </div>
                <div class="col-sm-12 col-xs-12 col-md-12">
                    <div class="form-group">
                        <strong>Subtítulo da página:</strong>
                        <input type="text" name="subtitulo" value="{{old('subtitulo')}}" class="form-control" placeholder="Digite o subtítulo da página...">
                    </div>
                </div>
                <div class="col-sm-12 col-xs-12 col-md-12">
                    <div class="form-group">
                        <strong>Conteúdo da página:</strong>
                        <input type="hidden" id="quill_html" name="conteudo" value="{{old('conteudo')}}">
                        <!-- Quill -->
                        <div id="quill"></div>
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