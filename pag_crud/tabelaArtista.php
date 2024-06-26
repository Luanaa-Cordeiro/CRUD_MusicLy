<?php
require('../database/config_art.php');
session_start();

if(!isset($_SESSION["id_info"])){
    header("Location: ../login/login.php");

    
}
?>


<!DOCTYPE html>
<html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artistas</title>
    <link rel="icon" href="../assets/MusicLy.ico">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>

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
                    <a href="tabelaArtista.php" class="sidebar-link active">
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
                                <button id="sair" data-bs-toggle="modal" data-bs-target="#modalSair">Sair</button>
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
                <a href="formArtista.php"><button class="btn adicionar">Adicionar</button></a>
                </div>

                <?php
                    if(isset($_GET['delete'])) {
                      echo '<div class="alerta alert-success alert alert-dismissible">
                      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                     <strong>Sucesso!</strong> O artista <b>' . $_GET["nome"] . '</b> foi deletado.
                     </div>';
                    } elseif(isset($_GET['adicionado'])) {
                      echo '<div class="alerta alert-success alert alert-dismissible">
                      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                     <strong>Sucesso!</strong> O artista <b>' . $_GET["nome"] . '</b> foi adicionado.
                     </div>';
                    } elseif(isset($_GET['atualizado'])) {
                      echo '<div class="alerta alert-success alert alert-dismissible">
                      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                      <strong>Sucesso!</strong> Um artista foi atualizado.
                      </div>
                      ';
                    }  elseif(isset($_GET['algo'])){
                      echo '<div class="alerta alert-danger alert alert-dismissible">
                      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                      <strong>Erro!</strong> Algo não foi processado corretamente.
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
                      <th id='ação'>Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      foreach($artistas as $artista){
                        echo "<tr>";
                        echo "<td>" . $artista['id_artista'] . "</td>";
                        echo "<td>" . $artista['nome'] . "</td>";
                        echo "<td class='botoes'>
                        <button type='submit' class ='btn deletar' data-bs-toggle='modal'
                        data-bs-target='#modalDeletar" . $artista['id_artista'] . "'>Deletar</button>";
                        
                        echo 
                        "<form id='form_atualizar' method ='get' action='./atualizar/receberValoresArt.php'>
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
          <a href='formArtista.php'><button class='btn botao_vazio'>Adicionar</button></a>";
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
                                    <a class="footer_item" href="../index.php">MusicLy</a>
                                    <a class="footer_item" href="./contato.php">Contato</a>
                                    <a class="footer_item" href="./sobre.php">Sobre nós</a>
                                    <a class="footer_item" href="./termos.php">Termos e Condições</a>
            </footer>
            
        </div>
    </div>
 

    <?php foreach ($artistas as $artista) {?>
    <div class="modal fade" id="modalDeletar<?php echo $artista['id_artista'];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Deletar Artista</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id='form_deletar' method ='post' action='./deletar/artista.php'>
        <input type='hidden' name='id' value=" <?php echo $artista['id_artista'] ?> "/>
        <input type='hidden' name='nome' value="<?php echo $artista['nome'] ?>"/>
        <span><b>Deseja realmente excluir esse artista?</b>
        Você apagará todas as músicas e álbuns relacionadas a ele.</span>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button id="botao_modal" type="submit" class="btn btn-primary">Excluir</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php }?>

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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="../script.js"></script>
  </body>
</body>
</html>