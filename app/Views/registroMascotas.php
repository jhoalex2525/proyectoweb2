<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gloria+Hallelujah&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php
                                    use App\Controllers\Mascotas;
                                    echo (base_url('public/styles/styles.css')) ?>">
    <title>ANIMALANDIA</title>
</head>
<body>
<header>
        <nav class="navbar navbar-expand-lg navbar-dark principalbackground">
            <div class="container-fluid">
                <a class="navbar-brand principalfont" href="#">
                    <i class="fas fa-cat"></i>
                    ANIMALANDIA
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="<?= site_url('/') ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= site_url('/productos/registro') ?>">Registro Productos</a>
                        </li>
                        <li class="nav-item">
							<a class="nav-link active" href="<?= site_url('/mascotas/registro')?>">Registro Mascotas</a>
						</li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>    
</body>
</html>