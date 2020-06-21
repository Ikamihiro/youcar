<section class="carousel-section mb-3 mt-3 ">
    <div class="container">
        <div id="carouselExampleControls" class="carousel slide shadow" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            </ol>
            <div class="carousel-inner">
                @foreach ($imagens as $key => $imagem)
                    <div class="carousel-item {{ $key == 0 ? ' active' : '' }}">
                        <img class="d-block w-100" src="{{ asset('storage/'. $imagem->path) }}" alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{ $imagem->titulo }}</h5>
                            <p>{{ $imagem->subtitulo }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Próximo</span>
            </a>
        </div>
    </div>
</section>
