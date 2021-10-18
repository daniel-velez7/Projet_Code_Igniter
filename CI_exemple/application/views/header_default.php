<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageName ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="<?= base_url() . 'assets/css/style.css' ?>">

</head>

<body>

    <div class="row">
        <div class="col-11 bg-dark">
            <ul class="col nav justify-content-center navbar-dark">
                <li class="nav-item">
                    <a class="nav-link text-white" href="<?= site_url("Display/connection/"); ?>">Connection</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="<?= site_url("Display/inscription/"); ?>">Inscription</a>
                </li>
            </ul>
        </div>
        <div class="col-1 d-flex bg-dark justify-content-end">
            <img class="logo" src="<?= base_url() . 'assets/images/smyle.png' ?>"></img>
        </div>
    </div>