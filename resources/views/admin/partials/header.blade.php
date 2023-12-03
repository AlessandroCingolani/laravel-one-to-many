<header class="bg-dark">
    <nav class="navbar navbar-dark h-100">
        <div class="container-fluid d-flex align-items-center">
            <a href="{{ route('home') }}" target="_blank" class="navbar-brand">Vai al sito</a>
            <h1 class="text-success m-0">Boolfolio</h1>
            <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
                @csrf
                <button class="btn btn-light" type="submit"><i class="fa-solid fa-right-from-bracket"></i></button>
            </form>
        </div>
    </nav>
</header>
