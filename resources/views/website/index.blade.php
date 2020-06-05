@extends('website.layouts.default')

@section('content')
    @include('website.partials.carousel')
    <section class="filtro-carros bg-secondary py-5">
        <div class="container">
            <form action="{{ route('root') }}">
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-auto">
                        <div class="form-group">
                            <select name="estados" id="estados_select">
                                <option disabled selected>Estado</option>
                                <option value="MT">Mato Grosso</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-auto">
                        <div class="form-group">
                            <select name="estados" id="estados_select">
                                <option disabled selected>Estado</option>
                                <option value="MT">Mato Grosso</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-auto">
                        <div class="form-group">
                            <select name="estados" id="estados_select">
                                <option disabled selected>Estado</option>
                                <option value="MT">Mato Grosso</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-auto">
                        <div class="form-group">
                            <select name="estados" id="estados_select">
                                <option disabled selected>Estado</option>
                                <option value="MT">Mato Grosso</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-auto">
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger">
                                Encontrar carro
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection