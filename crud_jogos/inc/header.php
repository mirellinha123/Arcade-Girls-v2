<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>ARCADE GIRL'S</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/all.min.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/style.css">
    <link rel="icon" type="image/icon" href="../img/favicon.png">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top container mb-3" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo BASEURL; ?>index.php">
                ARCADE GIRL'S
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCrud"
                aria-controls="navbarCrud" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCrud">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Jogos
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="<?php echo BASEURL; ?>customers">
                                    Gerenciar Jogos
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="<?php echo BASEURL; ?>customers/add.php">
                                    Novo Jogo
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="container">