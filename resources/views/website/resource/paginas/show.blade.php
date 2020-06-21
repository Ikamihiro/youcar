@extends('website.layouts.default')
@section('content')
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-auto h1">
                <strong>{{ $pagina->titulo }}</strong> 
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-auto h4">
                {{ $pagina->subtitulo }}
            </div>
        </div>
    </div>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                {!! $pagina->conteudo !!}
            </div>
        </div>
    </div>
@endsection