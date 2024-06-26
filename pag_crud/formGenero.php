<?php
require('../database/config_art.php');
session_start();
if(!isset($_SESSION["id_info"])){
    header("Location: ../login/login.php");

    
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Gêneros</title>
    <link rel="icon" href="../assets/MusicLy.ico">
    <link rel="stylesheet" href=".././node_modules/parsleyjs/src/parsley.css">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<body>
<div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="lni lni-grid-alt"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="../index.php">MusicLy</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="../index.php" class="sidebar-link">
                        <i class="lni lni-home"></i>
                        <span>Início</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="relatorioArtista.php" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                        <i class="lni lni-files"></i>
                        <span>Relatórios</span>
                    </a>
                    <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="relatorioArtista.php" class="sidebar-link">Artista</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="relatorioGenero.php" class="sidebar-link">Gênero</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="relatorioAlbum.php" class="sidebar-link">Álbum</a>
                        </li>
                    </ul>
                </li>
               
                <li class="sidebar-item">
                    <a href="tabelaArtista.php" class="sidebar-link">
                        <i class="lni lni-user"></i>
                        <span>Artistas</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="tabelaGenero.php" class="sidebar-link active">
                        <i class="lni lni-headphone"></i>
                        <span>Gêneros</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="tabelaAlbum.php" class="sidebar-link">
                        <i class="lni lni-book"></i>
                        <span>Álbuns</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="tabelaMusica.php" class="sidebar-link">
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
                                <img src="../assets/user.webp" class="avatar img-fluid" alt="">
                                <span><?php 
                              echo $_SESSION["nome"];
                            ?></span>
                            </a>
                            <div class="sair_menu dropdown-menu dropdown-menu-end rounded">
                                <i class="lni lni-exit"></i>
                                <<button id="sair" data-bs-toggle="modal" data-bs-target="#modalSair">Sair</button>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav> 

            <div id="formulario_gen">
            <form  method ="POST" class="form_php space-y-4 md:space-y-6" action="./cadastros/cadastGenero.php" data-parsley-validate>
            <div class="col-lg-6 mb-5 mb-lg-0">
          <div id="cadastrar_gen" class="card shadow">
          <?php
          if(isset($_GET['nome'])){
            echo '<div id="alerta" class="mb-0 alert-danger alert alert-dismissible">
                      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                      <strong>Esse gênero já existe!</strong> Tente novamente.
                      </div>
                      ';
          } elseif (isset($_GET['preencha'])){
            echo '<div id="preencher" style="color:#be0505;" class="alert-danger alert alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Preencha todos os campos</strong>
            </div>
            ';
        }
          ?>
          <span id="titulo_form">Adicione um Gênero!</span>

            <div class="card-body">
                <div class="row">
                  <div class=" mb-4">
                    <div class="input_gen form-outline ">
                    <label class="form-label" for="nome_genero">Nome do Gênero<span class="asterisco">*</span></label>
                    <div id="input_gen">
                      <input placeholder="Nome" name="nome" type="text" id="nome_genero" class="form-control" required/>
                      </div>
                    </div>
                  </div>

                  <div class="div_botao">
                <button id="botao" type="submit" data-mdb-ripple-init class="btn mb-3">
                 Adicionar
                </button>
                </div>
                <div id="voltar">
                <a href="tabelaGenero.php">Voltar</a>
                </div>


          </div>
        </div>
      </div>
    </div>
        </form>
        </div>

        <footer class="footer">
                                    <a class="footer_item" href="../index.php">MusicLy</a>
                                    <a class="footer_item" href="./contato.php">Contato</a>
                                    <a class="footer_item" href="./sobre.php">Sobre nós</a>
                                    <a class="footer_item" href="./termos.php">Termos e Condições</a>
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
        <a href="../login/php/logout.php"><button id="botao_modal" type="button" class="btn btn-primary">Sair</button></a>
      </div>
    </div>
  </div>
</div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
            <script src="../script.js"></script>
            <script src=".././node_modules/jquery/dist/jquery.js"></script>
            <script src=".././node_modules/parsleyjs/dist/parsley.min.js"></script>
            <script src=".././node_modules/parsleyjs/dist/i18n/pt-br.js"></script>
</body>
</html>