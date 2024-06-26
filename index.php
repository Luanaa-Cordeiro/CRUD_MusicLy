<?php
require('./database/config_art.php');
session_start();

if(!isset($_SESSION["id_info"])){
   header("Location: ./login/login.php");

}
?>


<!DOCTYPE html>
<html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MusicLy</title>
    <link rel="icon" href="./assets/MusicLy.ico">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="lni lni-grid-alt"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="index.php">MusicLy</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="index.php" class="sidebar-link active">
                        <i class="lni lni-home"></i>
                        <span>Início</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="./pag_crud/relatorioArtista.php" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                        <i class="lni lni-files"></i>
                        <span>Relatórios</span>
                    </a>
                    <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="./pag_crud/relatorioArtista.php" class="sidebar-link">Artista</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="./pag_crud/relatorioGenero.php" class="sidebar-link">Gênero</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="./pag_crud/relatorioAlbum.php" class="sidebar-link">Álbum</a>
                        </li>
                    </ul>
                </li>
               
                <li class="sidebar-item">
                    <a href="./pag_crud/tabelaArtista.php" class="sidebar-link">
                        <i class="lni lni-user"></i>
                        <span>Artistas</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="./pag_crud/tabelaGenero.php" class="sidebar-link">
                        <i class="lni lni-headphone"></i>
                        <span>Gêneros</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="./pag_crud/tabelaAlbum.php" class="sidebar-link">
                        <i class="lni lni-book"></i>
                        <span>Álbuns</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="./pag_crud/tabelaMusica.php" class="sidebar-link">
                        <i class="lni lni-music"></i>
                        <span>Músicas</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
               
            </div>
        </aside>
        <div class="main">
            <nav class="navbar navbar-expand px-4 py-3">
                <form action="#" class="d-none d-sm-inline-block">

                </form>
                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a style="color:white;" href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="./assets/user.webp" class="avatar img-fluid" alt="">
                                <span><?php 
                              echo $_SESSION["nome"];
                            ?></span>
                            </a>
                            <div class="sair_menu dropdown-menu dropdown-menu-end rounded">
                                <i class="lni lni-exit"></i>
                                <button id="sair" data-bs-toggle="modal" data-bs-target="#modalSair">Sair</button>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

      <div class="inicio">
      <h1>Bem-Vindo(a) <?php echo $_SESSION["nome"];?>!</h1>

      <div class="cartas row">
            <div class="card mb-3">
              <img src="./assets/nota_musical.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Músicas</h5>
                <p class="card-text">Músicas disponíveis: 
                <?php
                $sql = "SELECT COUNT(id_musica) AS total_musicas FROM musicas";
                $resultado = $conn->prepare($sql);
                $resultado->execute();
                $musicas = $resultado->fetch(PDO::FETCH_ASSOC);
                echo $musicas['total_musicas']; 
                ?>
                </p>
                <a href="./pag_crud/tabelaMusica.php" class="btn botao">Exibir</a>
              </div>
            </div>

            <div class="card mb-3">
              <img src="./assets/artista.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Artistas</h5>
                <p class="card-text">Artistas disponíveis: 
                <?php
                $sql = "SELECT COUNT(id_artista) AS total_artistas FROM artista";
                $resultado = $conn->prepare($sql);
                $resultado->execute();
                $artistas = $resultado->fetch(PDO::FETCH_ASSOC);
                echo $artistas['total_artistas']; 
                ?>
                </p>
                <a href="./pag_crud/tabelaArtista.php" class="btn botao">Exibir</a>
              </div>
            </div>

            <div class="card mb-3">
              <img src="./assets/album.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Álbuns</h5>
                <p class="card-text">Álbuns disponíveis: 
                <?php
                $sql = "SELECT COUNT(id_album) AS total_albuns FROM album";
                $resultado = $conn->prepare($sql);
                $resultado->execute();
                $albuns = $resultado->fetch(PDO::FETCH_ASSOC);
                echo $albuns['total_albuns']; 
                ?></p>
                <a href="./pag_crud/tabelaAlbum.php" class="btn botao">Exibir</a>
              </div>
            </div>

            <div class="card mb-3">
              <img src="./assets/generos.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Gêneros</h5>
                <p class="card-text">Gêneros disponíveis: 
                <?php
                $sql = "SELECT COUNT(id_genero) AS total_generos FROM genero";
                $resultado = $conn->prepare($sql);
                $resultado->execute();
                $generos = $resultado->fetch(PDO::FETCH_ASSOC);
                echo $generos['total_generos']; 
                ?>  
                </p>
                <a href="./pag_crud/tabelaGenero.php" class="btn botao">Exibir</a>
              </div>
            </div>
           </div>
          </div>

            <footer class="footer">
                                    <a class="footer_item" href="index.php">MusicLy</a>
                                    <a class="footer_item" href="./pag_crud/contato.php">Contato</a>
                                    <a class="footer_item" href="./pag_crud/sobre.php">Sobre nós</a>
                                    <a class="footer_item" href="./pag_crud/termos.php">Termos e Condições</a>
            </footer>
            
        </div>
    </div>

    <div class="modal fade" id="modalSair" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Sair da conta</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <span>Deseja realmente sair?</span>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <a href="./login/php/logout.php"><button id="botao_modal" type="button" class="btn btn-primary">Sair</button></a>
      </div>
    </div>
  </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>

</html>