<?php
session_start();

if (!isset($_SESSION["id_info"])) {
    header("Location: ../index.php");
    exit;
}

require('../../database/config_art.php');

if (isset($_POST["id"]) && isset($_POST["nome"]) && isset($_POST["data"]) && isset($_POST["artista"])) {
    $id_album = $_POST["id"];
    $nome_album = $_POST["nome"];
    $data = $_POST["data"];
    $artista_nome = $_POST["artista"];
} else {
    header("Location: ../tabelaArtista.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../.././node_modules/parsleyjs/src/parsley.css">
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
                    <a href="../inicio.php" class="sidebar-link">
                        <i class="lni lni-home"></i>
                        <span>Início</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="../" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                        <i class="lni lni-files"></i>
                        <span>Relatórios</span>
                    </a>
                    <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="../relatorioArtista.php" class="sidebar-link">Artista</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="../relatorioGenero" class="sidebar-link">Gênero</a>
                        </li>
                    </ul>
                </li>
               
                <li class="sidebar-item">
                    <a href="../tabelaArtista.php" class="sidebar-link">
                        <i class="lni lni-user"></i>
                        <span>Artistas</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="../tabelaGenero.php" class="sidebar-link">
                        <i class="lni lni-headphone"></i>
                        <span>Gêneros</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="../tabelaAlbum.php" class="sidebar-link">
                        <i class="lni lni-book"></i>
                        <span>Álbuns</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="../tabelaMusica.php" class="sidebar-link">
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
                                <img src="../../assets/user.webp" class="avatar img-fluid" alt="">
                                <span><?php 
                              echo $_SESSION["nome"];
                            ?></span>
                            </a>
                            <div class="sair_menu dropdown-menu dropdown-menu-end rounded">
                                <i class="lni lni-exit"></i>
                                <span><a id="sair" href="../../login/php/logout.php">Sair</a></span>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div id="formulario_alb">
            <form  method ="POST" class=" was-validated form_php space-y-4 md:space-y-6" action="album.php" data-parsley-validate>
            <div class="col-lg-6 mb-5 mb-lg-0">
          <div id="cadastrar_alb" class="card shadow">
          <?php
          if(isset($_GET['nome'])){
            echo '<div class="alert-danger alert alert-dismissible">
                      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                      <strong>Esse artista já existe!</strong> Tente novamente.
                      </div>
                      ';
          }
          ?>
          <span id="titulo_form">Atualize o Álbum!</span>
          <div id="inputs_alb" class="card-body">
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div data-mdb-input-init class="form-outline">
                    <input name="id" type="hidden" class="form-control form-control-lg bg-light fs-6" value="<?php echo $id_album;?>" required/>
                    <label class="form-label" for="name">Nome</label>
                      <input name="nome" type="text" id="name" class="form-control" value="<?php echo $nome_album;?>" required/>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div data-mdb-input-init class="form-outline">
                    <label class="form-label" for="data">Data Lançamento</label>
                      <input name="data" type="date" id="data" class="form-control" value="<?php echo $data;?>" required/>
                    </div>
                  </div>
                </div>

                    <div class="artista_select">
                <label for="artista" class="mb-2 fs-6 fw-medium text-gray-900">Artista</label>
                        <select name="artista" id="" required>
                        <?php
                                $sql = "SELECT * FROM artista";
                                $resultado = $conn->prepare($sql);
                                $resultado->execute();
                                $artistas = $resultado->fetchAll(PDO::FETCH_ASSOC);
                                if (count($artistas) > 0) {
                                    foreach ($artistas as $artista) {
                                        if($artista['nome'] == $artista_nome){
                                            $selected = 'selected';
                                        } else{
                                            $selected = '';
                                        }
                                        echo "<option value='" . $artista['id_artista'] . "' $selected>" . $artista['nome'] . "</option>";
                                    }
                                }
                                ?>
                </select>
                </div>
              
            
            <div class="div_botao">
                <button id="botao_alb" type="submit" data-mdb-ripple-init class="btn mb-4">
                 Adicionar
                </button>
                </div>
                <div id="voltar">
                <a href="../tabelaAlbum.php">Voltar</a>
                </div>

          </div>
        </div>
      </div>
    </div>
        </form>
        </div>

        <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-body-secondary">
                        <div class="col-6 text-start ">
                            <a class="text-body-secondary" href=" #">
                               
                            </a>
                        </div>
                        <div class="col-6 text-end text-body-secondary d-none d-md-block">
                            <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                    <a style="color:white;"class="" href="#">MusicLy</a>
                                </li>
                                <li class="list-inline-item">
                                    <a style="color:white; " href="#">Contato</a>
                                </li>
                                <li class="list-inline-item">
                                    <a style="color:white;" href="#">Sobre nós</a>
                                </li>
                                <li class="list-inline-item">
                                    <a style="color:white;" href="#">Termos e Condições</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../script.js"></script>
    <script src="../.././node_modules/jquery/dist/jquery.js"></script>
    <script src="../.././node_modules/parsleyjs/dist/parsley.min.js"></script>
    <script src="../.././node_modules/parsleyjs/dist/i18n/pt-br.js"></script>
  </body>
</body>
</html>
