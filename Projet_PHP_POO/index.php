<?php

session_start();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil</title>

    <?php include 'php/include.php'; ?>
</head>

<body>

    <?php

    if (isset($_SESSION['type']) == true) {
        include('php/body/header_connected.php');
        include('php/body/body_connected.php');
        include('php/body/footer.php');
    } else {
        include('php/body/header_default.php');
        include('php/body/body_default.php');
        include('php/body/footer.php');
    }
    ?>

</body>

</html>