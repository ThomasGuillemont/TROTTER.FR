<!-- unconnect -->
<div class="collapse" id="navbarToggleExternalContent">
    <div class="p-2">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="/profil?id=<?= $_SESSION['id_user'] ?? '' ?>">Profil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/actualités">Actualités</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/amis?id=<?= $_SESSION['id_user'] ?? '' ?>">Amis</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/déconnexion">Déconnexion</a>
            </li>
        </ul>
    </div>
</div>