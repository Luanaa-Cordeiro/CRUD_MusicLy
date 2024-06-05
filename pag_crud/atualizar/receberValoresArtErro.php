<?php
if (isset($_GET["id"]) && isset($_GET["nome"])) {
    $id_artista = $_GET["id"];
    $nome_artista = $_GET["nome"];

} else {
    
    header("Location: ../tabelaGenero.php");
    exit(); 
    
}
?>

<?php
require('../../database/config_art.php');
session_start();

if(!isset($_SESSION["id_info"])){
    header("Location: ../index.php");

    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                    <a href="#">MusicLy</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="inicio.php" class="sidebar-link">
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
                            <a href="#" class="sidebar-link">Gênero</a>
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
                    <a href="tabelaGenero.php" class="sidebar-link">
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
                <a href="../login/php/logout.php" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Sair</span>
                </a>
            </div>
        </aside>
        <div class="main">
            <nav class="navbar navbar-expand px-4 py-3">
                <form action="#" class="d-none d-sm-inline-block">

                </form>
                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="../assets/user.webp" class="avatar img-fluid" alt="">
                                <span><?php 
                              echo $_SESSION["nome"];
                            ?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end rounded">

                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div id="formulario">
            <form  method ="POST" class=" was-validated form_php space-y-4 md:space-y-6" action="artista.php" data-parsley-validate>
            <div class="col-lg-6 mb-5 mb-lg-0">
          <div id="cadastrar" class="card shadow">
          <?php
          if(isset($_GET['nome'])){
            echo '<div class="alert-danger alert alert-dismissible">
                      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                      <strong>Esse artista já existe!</strong> Tente novamente.
                      </div>
                      ';
          }
          ?>
          <span id="titulo_form">Atualize um Artista!</span>
            <div class="card-body">
                <div class="row">
                  <div class=" mb-4">
                    <div id="input_art" class="form-outline">
                    <input type="hidden" id="id" name="id" value="<?php echo $id_artista; ?>"/>
                    <label class="form-label" for="form3Example1">Nome</label>
                    <input placeholder="Nome" type="text" class="form-control form-control-lg bg-light fs-6"id="nome" name="nome" value="<?php echo $nome_artista; ?>"/><br>
                    </div>
                  </div>

                <div class="div_botao">
                <button id="botao" type="submit" data-mdb-ripple-init class="btn mb-4">
                 Salvar
                </button>
                </div>

          </div>
        </div>
      </div>
    </div>
        </form>
        </div>

           

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../script.js"></script>
  </body>
</body>
</html>