<?php

session_start();


if (!isset($_SESSION['type'])) {
    header('location: index.php');
    exit;
}

include('php/body/header_connected.php');
include 'php/include.php';

if (isset($_REQUEST['type'])) {
    if ($_REQUEST['type'] == 'projet') {
        include 'php/compte/projet.php';
    } else if ($_REQUEST['type'] == 'formation') {
        include 'php/compte/formation.php';
    }
} else {
    if ($_SESSION['type'] == 'formateur') {
        include 'php/compte/formateur.php';
    } else if ($_SESSION['type'] == 'intervenant') {
        include 'php/compte/intervenant.php';
    } else if ($_SESSION['type'] == 'stagiaire') {
        include 'php/compte/stagiaire.php';
    } else if ($_SESSION['type'] == 'administrateur') {
        include 'php/compte/administrateur.php';
    }
}


include('php/body/footer.php');
