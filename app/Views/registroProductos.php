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
                                    use App\Controllers\Productos;
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
                            <a class="nav-link active" href="<?= site_url('/productos/registro') ?>">Registro Productos</a>
                        </li>
                        <li class="nav-item">
							<a class="nav-link" href="<?= site_url('/mascotas/registro')?>">Registro Mascotas</a>
						</li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="container mt-5">
            <div class="row mt-5 d-flex justify-content-center">
                <div class="col-12 col-md-5">
                    <form method="POST" action="<?= site_url('/productos/registro/nuevo') ?>" class="mt-4">
                        <div class="mb-3">
                            <label for="" class="form-label">Producto:</label>
                            <input type="text" class="form-control" id="product" placeholder="" name="product">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Fotografía:</label>
                            <input type="text" class="form-control" id="photo" placeholder="" name="photo">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Precio Unidad:</label>
                            <input type="text" class="form-control" id="price" placeholder="" name="price">
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" name="description" id="description" cols="30" rows="5" placeholder="Descripción"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Tipo de animal:</label>
                            <select name="animaltype" class="form-control" id="animaltype">
                                <option value="0" selected disabled>Seleccione un animal</option>
                                <option value="1">Perro</option>
                                <option value="2">Gato</option>
                                <option value="3">Ave</option>
                                <option value="4">Caballo</option>
                                <option value="5">Reptil</option>
                            </select>
                        </div>
                        <div class="mb-3 d-grid gap-2">
                            <button type="submit" class="btn btn-primary">enviar</button>
                        </div>
                    </form>
                </div>
                <div class="col-12 col-md-5 align-self-center text-center">
                    <img class="img-fluid w-100" src="<?= base_url('public/img/imagen4.jpg') ?>" alt="">
                    <a class="btn btn-primary mt-2" href="<?= site_url('/productos/listado')?>">Ver inventario</a>
                </div>
            </div>
        </div>
    </main>
    <section>
        <?php if (session('mensaje')):?>
            <!-- Modal -->
            <div class="modal fade" id="modalresponse" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header principalbackground text-white">
                            <h5 class="modal-title">Animalandia</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h5><?= session('mensaje')?></h5>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/fb8e0c1491.js" crossorigin="anonymous"></script>
    <script type="module" src="<?= base_url('public/js/lanzarmodal.js') ?>"></script>
</body>

</html>