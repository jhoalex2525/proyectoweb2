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
    <link rel="stylesheet" href="<?php echo (base_url('public/styles/styles.css')) ?>">
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
							<a class="nav-link" href="<?= site_url('/mascotas/registro')?>">Registro Mascotas</a>
						</li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="container mt-5">
            <!-- pantalla peque??a una tarjeta row-cols-1 y 5 tarjetas en otra pantalla row-cols-md-5 -->
            <!-- g-4 da un padding -->
            <div class="row row-cols-1 row-cols-md-5 g-4">
                <!-- por cada vuelta en productos se dibuja un producto -->
                <?php foreach ($mascotas as $mascota) : ?>
                    <div class="col">
                        <!-- h-100 todas igual altura y p-3 padding de 3 -->
                        <div class="card h-100 p-3">
                            <!-- dentro del [] va el campo de la BD -->
                            <img src="<?= $mascota["animalphoto"] ?>" class="card-img-top h-100" alt="foto">
                            <div class="card-body">
                                <h5 class="card-title"><?= $mascota["animalname"] ?></h5>
                                <p class="card-text"><?= $mascota["animalage"] ?></p>
                                <a data-bs-toggle="modal" data-bs-target="#confirmacion<?= $mascota["id"] ?>" href="#" class="btn btn-primary"><i class="fas fa-trash-alt"></i></a>
                                <a data-bs-toggle="modal" data-bs-target="#edit<?= $mascota["id"] ?>" href="#" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                            </div>
                        </div>
                        <section>
                            <div class="modal fade" id="confirmacion<?= $mascota["id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header principalbackground text-white">
                                            <h5 class="modal-title" id="exampleModalLabel">Borrar Mascota</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>??Est??s seguro de borrar esta mascota?</p>
                                            <p><?= $mascota["id"] ?></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <a href="<?= site_url('/mascotas/eliminar/' . $mascota["id"]) ?>" class="btn btn-danger">Eliminar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section>
                            <div class="modal fade" id="edit<?= $mascota["id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header principalbackground text-white">
                                            <h5 class="modal-title" id="exampleModalLabel">Editar Mascota</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-3">
                                                    <img src="<?= $mascota["animalphoto"] ?>" alt="foto" class="img-fluid w-100">
                                                </div>
                                                <div class="col-9">
                                                    <form action="<?= site_url('/mascotas/edit/'.$mascota["id"])?>" method="POST">
                                                        <div class="mb-3">
                                                            <label class="form-label">Edad (meses)</label>
                                                            <input type="number" class="form-control" name="animalage" value="<?= $mascota["animalage"]?>">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Nombre</label>
                                                            <input type="text" class="form-control" name="animalname" value="<?= $mascota["animalname"]?>">
                                                        </div>
                                                        <button try="submit" class="btn btn-primary">Editar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>                                        
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                <?php endforeach ?>
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