<?php

session_start();

if (isset($_SESSION['type'])) {
    header('location: index.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connection</title>

    <?php include 'php/include.php'; ?>
</head>

<body>
    <?php include 'php/body/header_default.php' ?>

    <div class="container_formulaire">
        <div class="formulaire">
            <h5 class="form_title">Connection</h5>
            <div class="form_item">
                <label>email</label>
                <input type="email" name="email" id="email">
            </div>
            <div class="form_item">
                <label>Mot de passe</label>
                <input type="password" name="mdp" id="mdp">
            </div>
            <?php
            if ($_REQUEST['type_account'] == 'stagiaire') {
                echo "<button class='btn btn-success button_form' onclick='Connection_Stagiaire()'>Se connecter</button>";
            } else if ($_REQUEST['type_account'] == 'formateur') {
                echo "<button class='btn btn-success button_form' onclick='Connection_Formateur()'>Se connecter</button>";
            } else if ($_REQUEST['type_account'] == 'intervenant') {
                echo "<button class='btn btn-success button_form' onclick='Connection_Intervenant()'>Se connecter</button>";
            } else if ($_REQUEST['type_account'] == 'administrateur') {
                echo "<button class='btn btn-success button_form' onclick='Connection_Administrateur()'>Se connecter</button>";
            }
            ?>
            <div id='status'></div>
        </div>
    </div>

    <?php include 'php/body/footer.php' ?>
</body>

</html>