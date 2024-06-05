<?php
require('../database/config_art.php');
session_start();

if(!isset($_SESSION["id_info"])){
    header("Location: ../index.php");

    
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar With Bootstrap</title>
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
                                <span><a id="sair" href="../login/php/logout.php">Sair</a></span>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>


            <div class="tabela">
            <div class="">
              <div class="titulo">
                
              <?php
                $sql = "SELECT * FROM artista";
                $resultado = $conn->prepare($sql);
                $resultado->execute();
                $artistas = $resultado->fetchAll(PDO::FETCH_ASSOC);
                if(count($artistas) > 0){
                ?>
                <h1>Artistas</h1>
                <button class="btn adicionar"><a href="formArtista.php">Adicionar</a></button>
                </div>

                <?php
                    if(isset($_GET['delete'])) {
                      echo '<div class="alert-success alert alert-dismissible">
                      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                      <strong>Sucesso!</strong> Um artista foi deletado.
                      </div>
                      ';
                    } elseif(isset($_GET['adicionado'])) {
                      echo '<div  class="alert-success alert alert-dismissible">
                      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                      <strong>Sucesso!</strong> Um artista foi adicionado.
                      </div>
                      ';
                    } elseif(isset($_GET['atualizado'])) {
                      echo '<div class=" alert-success  alert alert-dismissible">
                      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                      <strong>Sucesso!</strong> Um artista foi atualizado.
                      </div>
                      ';
                    }  
                  ?>

                  <div class="table-wrapper">
                <table class="table table-responsive table-striped table-hover">
                  <thead class="">
                    <tr>
                      <th style="background-color:#66276A; color:white;">Id</th>
                      <th style="background-color:#66276A; color:white;">Nome</th>
                      <th style="background-color:#66276A; color:white;"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      foreach($artistas as $artista){
                        echo "<tr>";
                        echo "<td>" . $artista['id_artista'] . "</td>";
                        echo "<td>" . $artista['nome'] . "</td>";
                        echo "<td id='botoes'>
                        <button type='submit' class ='btn deletar' data-bs-toggle='modal'
                        data-bs-target='#modalDeletar" . $artista['id_artista'] . "'>Deletar</button>";
                        
                        echo 
                        "<form id='form_atualizar' method ='post' action='./atualizar/receberValoresArt.php'>
                        <input type='hidden' name='id' value='" . $artista['id_artista'] . "'/>
                        <input type='hidden' name='nome' value='" . $artista['nome'] . "'/>
                        <button type='submit' class ='btn atualizar'>Atualizar</button>
                        </form>
                        </td>";
                        echo "</tr>";

                      }
                      ?>

                  </tbody>
                </table>
                <?php
        } else{
          echo"<div class='main_vazio'>";
          echo"<div class='vazio'>";
          echo"<div class='elementos_vazios'>";
          echo "<h1>Artistas</h1>
          <button class='btn botao_vazio'><a href='formArtista.php'>Adicionar</a></button>";
          echo"</div>";
          echo "<h2>Você não tem nenhum Artista cadastrado!</h2>";
          echo"</div>";
          echo"<div>";
        }
        ?>
              </div>
            </div>
        </div>
    </div>
</div>
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
 

    <?php foreach ($artistas as $artista) {?>
    <div class="modal fade" id="modalDeletar<?php echo $artista['id_artista'];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Deletar Artista</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id='form_deletar' method ='post' action='./deletar/artista.php'>
        <input type='hidden' name='id' value=" <?php echo $artista['id_artista'] ?> "/>
        <input type='hidden' name='nome' value="<?php echo $artista['nome'] ?>"/>
    <span>Deseja realmente excluir esse artista?</span>
      </div>
      <div class="modal-footer">
        <button id="botao_modal" type="submit" class="btn btn-primary">Excluir</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php }?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="script.js"></script>
  </body>
</body>
</html>