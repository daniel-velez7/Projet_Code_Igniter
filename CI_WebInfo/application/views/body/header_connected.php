<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche</title>

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