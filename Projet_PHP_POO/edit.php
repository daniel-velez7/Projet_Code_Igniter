<?php

session_start();


if (!isset($_SESSION['type'])) {
    header('location: index.php');
    exit;
}

if ($_SESSION['type'] != 'administrateur') {
    header('location: index.php');
    exit;
}

include('php/body/header_connected.php');
include 'php/include.php';

if ($_REQUEST['type'] == 'formateur') {
    include 'php/admin/formateur.php';
} else if ($_REQUEST['type'] == 'intervenant') {
    include 'php/admin/intervenant.php';
} else if ($_REQUEST['type'] == 'stagiaire') {
    include 'php/admin/stagiaire.php';
} else if ($_REQUEST['type'] == 'formation') {
    include 'php/admin/formation.php';
} else if ($_REQUEST['type'] == 'projet') {
    include 'php/admin/projet.php';
} else if ($_REQUEST['type'] == 'competence') {
    include 'php/admin/competence.php';
} else if ($_REQUEST['type'] == 'specialisation') {
    include 'php/admin/specialisation.php';
}  else if ($_REQUEST['type'] == 'admission') {
    include 'php/admin/admission-demandes.php';
}

include('php/body/footer.php');
