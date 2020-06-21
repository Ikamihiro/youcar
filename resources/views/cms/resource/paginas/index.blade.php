@extends('cms.layouts.default')
@section('content')
    <div class="container">
        <div class="row justify-content-between align-items-center mb-3">
            <div class="col-md-auto">
                <h3 class="mb-0">Páginas</h3>
            </div>
            <div class="col-md-auto">
                <a href="{{ route('admin.paginas.create') }}" class="btn btn-success">Nova Página</a>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Subtítulo</th>
                    <th>URL</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody> {{-- {{ $pagina->conteudo }}  --}}
                @foreach ($paginas as $pagina)
                    <tr>
                        <th>{{ $pagina->titulo }}</th>
                        <th>{{ $pagina->subtitulo }}</th>
                        <th><a href="{{ url($pagina->slug) }}">{{ url($pagina->slug) }}</a></th>
                        <th>
                            <form action="{{ route('admin.paginas.destroy', $pagina->id) }}" method="POST">
                                <a href="{{ route('admin.paginas.edit', $pagina->id) }}" class="btn btn-warning">
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