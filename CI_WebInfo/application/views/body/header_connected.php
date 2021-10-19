<nav class="navbar d-flex w-100 flex-row header">
    <div class="d-flex">
        <ul class="navbar-nav flex-row align-items-center">
            <li class="nav-item mx-2"><a href="index.php"><img class="height_max" src="images/Webinfo_logo.png" alt="logo_webinfo"></a></li>
            <ul class="navbar-nav">
                <li class="nav-item mx-2"><a class="btn btn-color mx-3" href='<?= site_url('Acceuil/index')?>'>Acceuil</a></li>
            </ul>
            <div class="dropdown">
                <button class="btn btn-color dropdown-toggle mx-3" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    Rechercher
                </button>
                <ul class="dropdown-menu absolute" aria-labelledby="dropdownMenuButton">
                    <?php
                    if ($_SESSION['type'] == 'formateur' || $_SESSION['type'] == 'stagiaire') {
                        echo "<li><a class='dropdown-item' href='search.php?type=formation'>Formations</a></li>";
                    }
                    if ($_SESSION['type'] == 'intervenant' || $_SESSION['type'] == 'stagiaire') {
                        echo "<li><a class='dropdown-item' href='search.php?type=projet'>Projets</a></li>";
                    }
                    ?>
                    <li><a class="dropdown-item" href="search.php?type=formateur">Formateurs</a></li>
                    <li><a class="dropdown-item" href="search.php?type=intervenant">Intervenants</a></li>
                </ul>
            </div>
        </ul>
    </div>
    <ul class="navbar-nav flex-row justify-content-end">

        <?php

        if (isset($_SESSION['type'])) {
            if ($_SESSION['type'] == 'administrateur') {
                include 'php/body/menu_admin.php';
            }
        }

        ?>

        <div class="dropdown">
            <button class="btn btn-color dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                mon compte
            </button>
            <ul class="dropdown-menu absolute" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="compte.php">Mon Compte</a></li>
                <?php
                if ($_SESSION['type'] == 'formateur' || $_SESSION['type'] == 'stagiaire') {
                    echo "<li><a class='dropdown-item' href='compte.php?type=formation'>Mes formations</a></li>";
                }
                if ($_SESSION['type'] == 'intervenant' || $_SESSION['type'] == 'stagiaire') {
                    echo "<li><a class='dropdown-item' href='compte.php?type=projet'>Mes Projets</a></li>";
                }
                ?>
                <li><a class="dropdown-item" href="deconnection.php">Déconnection</a></li>
            </ul>
        </div>
    </ul>
</nav>