@extends('cms.layouts.default')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="jumbotron jumbotron-fluid bg-light">
                <div class="container row justify-content-center">
                    <div class="col-md-auto">
                        <h1 class="display-4">Painel Administrativo</h1>
                    </div>
                </div>
                <div class="container row justify-content-center">
                    <div class="col-md-auto">
                        <p class="lead">
                            Painel Administrativo dos dados do Website Youcar
                        </p>
                    </div>
                </div>
                <div class="container row justify-content-center">
                    <div class="col-md-auto">
                        <a class="btn btn-danger" href="{{ route('admin.sincronizar') }}">
                            Sincronizar dados
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
