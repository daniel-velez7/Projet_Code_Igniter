<?php

session_start();

if (!isset($_REQUEST['subscribe'])) {
    if (isset($_SESSION['type'])) {
        header('location: index.php');
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>

    <?php include 'php/include.php'; ?>
</head>

<body>
    <?php

    if (isset($_REQUEST['subscribe'])) {
        include 'php/body/header_connected.php';
        include 'php/inscription/stagiaire_inscription.php';
    } else {
        include 'php/body/header_default.php';
        if (isset($_REQUEST['type_account'])) {
            if ($_REQUEST['type_account'] == 'stagiaire') {
                include 'php/inscription/stagiaire.php';
            } else if ($_REQUEST['type_account'] == 'formateur') {
                include 'php/inscription/formateur.php';
            } else if ($_REQUEST['type_account'] == 'intervenant') {
                include 'php/inscription/intervenant.php';
            }
        }
    }

    include 'php/body/footer.php';
    ?>
</body>

</html>