<!-- connect -->
<div class="collapse" id="navbarToggleExternalContent">
    <div class="pt-3">
        <ul class="navbar-nav d-flex flex-md-row justify-content-evenly">
            <li class="nav-item">
                <a class="nav-link active" href="/accueil">Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="/profil?id=<?= $_SESSION['user']->id ?? '' ?>">Mon profil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/actualites">Fil d'actualités</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/amis?id=<?= $_SESSION['user']->id ?? '' ?>">Mes amis</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/deconnexion">Déconnexion</a>
            </li>
        </ul>
    </div>
</div>