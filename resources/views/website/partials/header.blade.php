<header>
    <section class="hero">
        <div class="container-lg">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-auto">
                    <a href="{{ route('root') }}" class="hero-brand">
                        <img src="{{ asset('resources/images/youcar_logo.png') }}" alt="">
                    </a>
                </div>
                <div class="col-md-auto">
                    <form class="hero-form">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-md-auto">
                                <input class="form-control mr-sm-2" type="search" placeholder="Pesquise algo ..." aria-label="Search">
                            </div>
                            <div class="col-md-auto">
                                <button class="btn btn-danger my-2 my-sm-0" type="submit">Pesquisar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" 
                data-target="#navbarContent" aria-controls="navbarContent" 
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <div class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="{{ route('root') }}" class="nav-link">Início</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('root') }}" class="nav-link">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('root') }}" class="nav-link">Contato</a>
                    </li>
                </div>
            </div>
        </div>
    </nav>
</header>