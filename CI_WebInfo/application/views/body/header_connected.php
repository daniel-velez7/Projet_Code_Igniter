<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageName ?></title>

    <!-- Lien vers boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous" defer></script>

    <!-- ----------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------- -->
    <!-- ------------------------------------Fichier CSS------------------------------------------------ -->
    <!-- ----------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------- -->


    <!-- Lien pour avoir une police d'écriture -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bowlby+One+SC&display=swap" rel="stylesheet">

    <!-- Lien vers boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <!-- Fichier CSS personnalisé -->
    <link rel="stylesheet" href="<?= base_url("assets/css/form_inscription.css"); ?>">
    <link rel="stylesheet" href="<?= base_url("assets/css/search.css"); ?>">
    <link rel="stylesheet" href="<?= base_url("assets/css/edit.css"); ?>">
    <link rel="stylesheet" href="<?= base_url("assets/css/header.css"); ?>">
    <link rel="stylesheet" href="<?= base_url("assets/css/footer.css"); ?>">
    <link rel="stylesheet" href="<?= base_url("assets/css/body.css"); ?>">

</head>

<body>

    <nav class="navbar d-flex w-100 flex-row header">
        <div class="d-flex">
            <ul class="navbar-nav flex-row align-items-center">
                <li class="nav-item mx-2"><a href="index.php"><img class="height_max" src="<?= base_url("assets/images/Webinfo_logo.png"); ?>" alt="logo_webinfo"></a></li>
                <ul class="navbar-nav">
                    <li class="nav-item mx-2"><a class="btn btn-color mx-3" href='<?= site_url('Acceuil/index') ?>'>Acceuil</a></li>
                </ul>
                <div class="dropdown">
                    <button class="btn btn-color dropdown-toggle mx-3" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        Rechercher
                    </button>
                    <ul class="dropdown-menu absolute" aria-labelledby="dropdownMenuButton">
                        <?php
                        if ($type == 'formateur') {
                            echo "<li><a class='dropdown-item' href='" . site_url("Formateur/search_formation") . "'>Formations</a></li>";
                            echo  "<li><a class='dropdown-item' href='" . site_url("Formateur/search_projet") . "'>Projets</a></li>";
                            echo  "<li><a class='dropdown-item' href='" . site_url("Formateur/search_formateur") . "'>Formateurs</a></li>";
                            echo  "<li><a class='dropdown-item' href='" . site_url("Formateur/search_intervenant") . "'>Intervenants</a></li>";
                        }
                        if ($type == 'intervenant') {
                            echo "<li><a class='dropdown-item' href='" . site_url("Intervenant/search_formation") . "'>Formations</a></li>";
                            echo "<li><a class='dropdown-item' href='" . site_url("Intervenant/search_projet") . "'>Projets</a></li>";
                            echo  "<li><a class='dropdown-item' href='" . site_url("Intervenant/search_formateur") . "'>Formateurs</a></li>";
                            echo  "<li><a class='dropdown-item' href='" . site_url("Intervenant/search_intervenant") . "'>Intervenants</a></li>";
                        }
                        if ($type == 'stagiaire') {
                            echo "<li><a class='dropdown-item' href='" . site_url("Stagiaire/search_formation") . "'>Formations</a></li>";
                            echo "<li><a class='dropdown-item' href='" . site_url("Stagiaire/search_projet") . "'>Projets</a></li>";
                            echo  "<li><a class='dropdown-item' href='" . site_url("Stagiaire/search_formateur") . "'>Formateurs</a></li>";
                            echo  "<li><a class='dropdown-item' href='" . site_url("Stagiaire/search_intervenant") . "'>Intervenants</a></li>";
                        }
                        if ($type == 'administrateur') {
                            echo "<li><a class='dropdown-item' href='" . site_url("Administrateur/search_formation") . "'>Formations</a></li>";
                            echo "<li><a class='dropdown-item' href='" . site_url("Administrateur/search_projet") . "'>Projets</a></li>";
                            echo  "<li><a class='dropdown-item' href='" . site_url("Administrateur/search_formateur") . "'>Formateurs</a></li>";
                            echo  "<li><a class='dropdown-item' href='" . site_url("Administrateur/search_intervenant") . "'>Intervenants</a></li>";
                        }
                        ?>

                    </ul>
                </div>
            </ul>
        </div>
        <ul class="navbar-nav flex-row justify-content-end">

            <?php

            if ($type == 'administrateur') { ?>
                <div class="dropdown">
                    <button class="btn btn-color dropdown-toggle mx-3" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        Administration
                    </button>
                    <ul class="dropdown-menu absolute mx-3" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="<?= site_url("Administrateur/edit_formation") ?>">Editer formation</a></li>
                        <li><a class="dropdown-item" href="<?= site_url("Administrateur/edit_projet") ?>">Editer projet</a></li>
                        <li><a class="dropdown-item" href="<?= site_url("Administrateur/edit_stagiaire") ?>">Editer stagiaire</a></li>
                        <li><a class="dropdown-item" href="<?= site_url("Administrateur/edit_formateur") ?>">Editer formateur</a></li>
                        <li><a class="dropdown-item" href="<?= site_url("Administrateur/edit_intervenant") ?>">Editer intervenant</a></li>
                        <li><a class="dropdown-item" href="<?= site_url("Administrateur/edit_competence") ?>">Editer competence</a></li>
                        <li><a class="dropdown-item" href="<?= site_url("Administrateur/edit_specialisation") ?>">Editer spécialisation</a></li>
                        <li><a class="dropdown-item" href="<?= site_url("Administrateur/edit_admission") ?>">Editer demande d'admission</a></li>
                    </ul>
                </div>
            <?php }

            ?>

            <div class="dropdown">
                <button class="btn btn-color dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    mon compte
                </button>
                <ul class="dropdown-menu absolute" aria-labelledby="dropdownMenuButton">
                    <?php
                    if ($type == 'formateur') { ?>
                        <li><a class="dropdown-item" href="<?= site_url("Formateur/compte") ?>">Mon Compte</a></li>
                        <li><a class='dropdown-item' href='<?= site_url("Formateur/compte_formation") ?>'>Mes formations</a></li>
                        <li><a class="dropdown-item" href="<?= site_url("Formateur/deconnection") ?>">Déconnection</a></li>
                    <?php }
                    if ($type == 'intervenant') { ?>
                        <li><a class="dropdown-item" href="<?= site_url("Intervenant/compte") ?>">Mon Compte</a></li>
                        <li><a class='dropdown-item' href='<?= site_url("Intervenant/compte_projet") ?>'>Mes Projets</a></li>
                        <li><a class="dropdown-item" href="<?= site_url("Intervenant/deconnection") ?>">Déconnection</a></li>
                    <?php }
                    if ($type == 'stagiaire') { ?>
                        <li><a class="dropdown-item" href="<?= site_url("Stagiaire/compte") ?>">Mon Compte</a></li>
                        <li><a class='dropdown-item' href='<?= site_url("Stagiaire/compte_projet") ?>'>Mes Projets</a></li>
                        <li><a class='dropdown-item' href='<?= site_url("Stagiaire/compte_formation") ?>'>Mes formations</a></li>
                        <li><a class="dropdown-item" href="<?= site_url("Stagiaire/deconnection") ?>">Déconnection</a></li>
                    <?php }
                    if ($type == 'administrateur') { ?>
                        <li><a class="dropdown-item" href="<?= site_url("Administrateur/compte") ?>">Mon Compte</a></li>
                        <li><a class="dropdown-item" href="<?= site_url("Administrateur/deconnection") ?>">Déconnection</a></li>
                    <?php }
                    ?>
                </ul>
            </div>
        </ul>
    </nav>