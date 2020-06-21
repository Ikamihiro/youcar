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
                            <a href="#" class="btn btn-link btn-social">
                                <i class="fab fa-whatsapp-square"></i>
                            </a>
                        </div>
                        <div class="col-md-auto">
                            <a href="#" class="btn btn-link btn-social">
                                <i class="fab fa-instagram-square"></i>
                            </a>
                        </div>
                        <div class="col-md-auto">
                            <a href="#" class="btn btn-link btn-social">
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
                    <li class="nav-item">
                        <a href="{{ route('root') }}" class="nav-link">
                            Sobre
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('root') }}" class="nav-link">
                            Contato
                        </a>
                    </li>
                </div>
            </div>
        </div>
    </nav>
</header>