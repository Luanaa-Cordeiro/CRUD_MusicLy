<?php
require('../database/config_art.php');
session_start();

if(!isset($_SESSION["id_info"])){
   header("Location: ../index.php");

}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style_inicio.css">
</head>
<body>

  <div class="navi">
    
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
                    <hr>
                    <div class="dropdown pb-4">
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
            </div>

            <div class="col">
              
          <div class="cartas row">
            <div class="card">
              <img src="../assets/nota_musical.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Músicas</h5>
                <p class="card-text">Músicas disponíveis: 0</p>
                <a href="#" class="btn botao">Exibir</a>
              </div>
            </div>

            <div class="card">
              <img src="../assets/artista.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Artistas</h5>
                <p class="card-text">Artistas disponíveis: 0</p>
                <a href="#" class="btn botao">Exibir</a>
              </div>
            </div>

            <div class="card">
              <img src="../assets/album.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Álbuns</h5>
                <p class="card-text">Álbuns disponíveis: 0</p>
                <a href="#" class="btn botao">Exibir</a>
              </div>
            </div>

            <div class="card">
              <img src="../assets/generos.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Gêneros</h5>
                <p class="card-text">Gêneros disponíveis: 0</p>
                <a href="#" class="btn botao">Exibir</a>
              </div>
            </div>
           </div>
          </div>


    
 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</body>
</html>