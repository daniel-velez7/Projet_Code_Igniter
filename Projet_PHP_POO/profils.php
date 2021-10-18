<?php

session_start();

if (!isset($_SESSION['type'])) {
    header('location: connection.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche</title>

<?php include 'php/include.php'; ?>

</head>

<body>
    <?php include 'php/body/header_connected.php';

    if ($_REQUEST['type'] == 'formateur') {
        include 'php/profils/formateur.php';
    } else if ($_REQUEST['type'] == 'intervenant') {
        include 'php/profils/intervenant.php';
    }

    include 'php/body/footer.php'; ?>
</body>

</html>