<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado"
            aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home<span class="sr-only"></span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="">Register</a>
            </li>
        </ul>
    </div>
</nav>
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title-guide">
            Bem-vindo <?= $_SESSION['name'] ?>!
        </div>
    </div>
</div>
