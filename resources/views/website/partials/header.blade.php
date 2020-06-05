<header>
    <section class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-auto">
                    <a href="#" class="hero-brand">
                        <h2>YouCar</h2>
                    </a>
                </div>
                <div class="col-md-auto">
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <div class="container">
            <button class="navbar-toggler" 
                type="button" data-toggle="collapse" 
                data-target="#navbarContent" 
                aria-controls="navbarContent" 
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <div class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="{{ route('root') }}" class="nav-link">INICIO</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('root') }}" class="nav-link">SOBRE</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('root') }}" class="nav-link">CONTATO</a>
                    </li>
                </div>
            </div>
        </div>
    </nav>
</header>