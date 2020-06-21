@extends('cms.layouts.default')
@section('content')
    <div class="container">
        <div class="row justify-content-between align-items-center mb-3">
            <div class="col-md-auto">
                <h3 class="mb-0">Carousel</h3>
            </div>
            <div class="col-md-auto">
                <div class="row">
                    <div class="col">
                        <a href="{{ route('admin.carousel.create') }}" class="btn btn-success">Inserir Nova Imagem</a>
                    </div>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
    </div>
    <div class="container">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th width="30%">Imagem</th>
                    <th>Titulo</th>
                    <th>Subtitulo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($imagens as $imagem)
                    <tr>
                        <th>
                            <img class="img-fluid" src="{{ asset('storage/' . $imagem->path) }}">
                        </th>
                        <th>{{ $imagem->titulo }}</th>
                        <th>{{ $imagem->subtitulo }}</th>
                        <th>
                            <form action="{{ route('admin.veiculos.destroy', $imagem->id) }}" method="POST">
                                <a href="{{ route('admin.veiculos.show', $imagem->id) }}" class="btn btn-info">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.veiculos.edit', $imagem->id) }}" class="btn btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>

                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection