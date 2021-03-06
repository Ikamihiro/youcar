<header>
    <section class="hero">
        <div class="container-lg">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-auto">
                    <a href="{{ route('root') }}" class="hero-brand">
                        <img src="{{ asset('resources/images/youcar_logo.png') }}" alt="">
                    </a>
                </div>
                <div class="col-md-auto hero-social">
                    <div class="row justify-content-end align-items-center">
                        <div class="col-md-auto">
                            <strong>Nos siga nas redes sociais</strong>
                        </div>
                    </div>
                    <div class="row justify-content-end align-items-center">
                        <div class="col-md-auto">
                            <div class="dropdown">
                                <a href="#" class="btn btn-link btn-social"
                                    id="dropdown-whats" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fab fa-whatsapp-square"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdown-whats">
                                    <a class="dropdown-item" 
                                        href="https://api.whatsapp.com/send?phone=5565981229088">
                                        Josy Anne - (65) 98122-9088
                                    </a>
                                    <a class="dropdown-item" 
                                        href="https://api.whatsapp.com/send?phone=5565981146433">
                                        Ronie - (65) 98114-6433
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-auto">
                            <a href="https://www.instagram.com/youcar_multimarcas" class="btn btn-link btn-social">
                                <i class="fab fa-instagram-square"></i>
                            </a>
                        </div>
                        <div class="col-md-auto">
                            <a href="https://www.facebook.com/You-Car-Multimarcas-120600192970895" class="btn btn-link btn-social">
                                <i class="fab fa-facebook-square"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary shadow">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" 
                data-target="#navbarContent" aria-controls="navbarContent" 
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <div class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="{{ route('root') }}" class="nav-link">
                            <i class="fas fa-home"></i> Início
                        </a>
                    </li>
                    @foreach ($paginas as $pagina)
                        <li class="nav-item">
                            <a href="{{ route('show_page', $pagina->slug) }}" class="nav-link">
                                {{ $pagina->titulo }}
                            </a>
                        </li>
                    @endforeach
                </div>
            </div>
        </div>
    </nav>
</header>