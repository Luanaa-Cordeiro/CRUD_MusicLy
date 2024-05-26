<?php
require('../database/config_art.php');
session_start();
if(!isset($_SESSION["id_info"])){
    header("Location: ../login/index.php");

    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/artista.css">
</head>
<body>
<div class="navi">
<hr>
                    <div id="sair" class="dropdown">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="../assets/usuario.avif" alt="hugenerd" width="30" height="30" class="rounded-circle">
                            <span class="d-none d-sm-inline mx-1">
                            <?php 
                              echo $_SESSION["nome"];
                            ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="../login/php/logout.php">Sair</a></li>
                        </ul>
                    </div>
  </div>
  
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 navs">
              
                <div id="elementos_nav"class="d-flex flex-column align-items-center align-items-sm-start  text-white min-vh-100">
                  <h4>Musicly</h4>
                    
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item">
        
                            <a href="#" class="nav-link align-middle px-0 d-flex align-items-center">
                                <img src="../assets/casa.png" alt="">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Início</span>
                            </a>
                        </li>
                        
                        <li>
                            <a href="#" class="nav-link px-0 align-middle">
                                <img src="../assets/reprodutor-de-musica.png" alt="">
                                <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Músicas</span>
                            </a>
                        </li>
    
                        <li>
                            <a href="#" class="nav-link px-0 align-middle">
                                <img src="../assets/pessoa.png" alt="">
                                <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Artistas</span> 
                            </a>
                        </li>

                        <li>
                            <a href="#" class="nav-link px-0 align-middle">
                                <img src="../assets/vinil.png" alt="">
                                <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Playlists</span> 
                            </a>
                        </li>
                    </ul>
                    
                </div>
            </div> 

            <form method ="POST" class=" was-validated form_php space-y-4 md:space-y-6" action="./cadastros/cadastArtista.php" data-parsley-validate>
                <div class="main">
                    <div class="formulario">

                    <div class="header-text mb-1 ">
                        <h2>Adicione um Artista!</h2>
                    </div>

                    <div id ="input_usuario" class=" d-flex flex-column">
                        <label for="nome" class="mb-2 fs-6 fw-medium text-gray-900">Artista</label>
                        <input name="nome" id="nome" type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Nome" required>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-lg fs-6" id="botao">Entrar</button>
                    </div>

                </div>
                </div>
        </form>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>