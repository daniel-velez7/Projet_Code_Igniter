<nav class="navbar d-flex w-100 flex-row header">
    <div class="d-flex align-items-center">
        <ul class="navbar-nav">
            <li class="nav-item mx-2"><a href="index.php"><img class="height_max" src="images/Webinfo_logo.png" alt="logo_webinfo"></a></li>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item mx-2"><a class="btn btn-color mx-3" href='index.php'>Acceuil</a></li>
        </ul>
    </div>
    <ul class="navbar-nav flex-row justify-content-end">
        <div class="dropdown">
            <button class="btn btn-color dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                connection
            </button>
            <ul class="dropdown-menu absolute" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="connection.php?type_account=stagiaire">Stagiaire</a></li>
                <li><a class="dropdown-item" href="connection.php?type_account=formateur">Formateur</a></li>
                <li><a class="dropdown-item" href="connection.php?type_account=intervenant">Intervenant</a></li>
                <li><a class="dropdown-item" href="connection.php?type_account=administrateur">Administrateur</a></li>
            </ul>
        </div>
        <div class="dropdown">
            <button class="btn btn-color dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                inscription
            </button>
            <ul class="dropdown-menu absolute" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="inscription.php?type_account=stagiaire">Stagiaire</a></li>
                <li><a class="dropdown-item" href="inscription.php?type_account=formateur">Formateur</a></li>
                <li><a class="dropdown-item" href="inscription.php?type_account=intervenant">Intervenant</a></li>
            </ul>
        </div>
    </ul>
</nav>