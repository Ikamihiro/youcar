@extends('cms.layouts.default')
@section('content')
    <div class="container">
        <div class="row justify-content-between align-items-center mb-3">
            <div class="col-md-auto">
                <h3 class="mb-0">Veículos</h3>
            </div>
            <div class="col-md-auto">
                <a href="{{ route('admin.veiculos.create') }}" class="btn btn-success">Novo Veículo</a>
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
                    <th>Modelo</th>
                    <th>Marca</th>
                    <th>Valor</th>
                    <th>Quilometragem</th>
                    <th>Cor</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($veiculos as $veiculo)
                    <tr>
                        <th>{{ $veiculo->modelo }}</th>
                        <th>{{ $veiculo->marca->nome }}</th>
                        <th>R$ {{ number_format(strval($veiculo->valor),2,",",".") }}</th>
                        <th>{{ number_format(strval($veiculo->quilometragem),0,",",".") }} KM</th>
                        <th>{{ $veiculo->cor }}</th>
                        <th>
                            <form action="{{ route('admin.veiculos.destroy', $veiculo->id) }}" method="POST">
                                <a href="{{ route('admin.veiculos.show', $veiculo->id) }}" class="btn btn-info">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.veiculos.edit', $veiculo->id) }}" class="btn btn-warning">
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
        {!! $veiculos->links() !!}
    </div>
@endsection