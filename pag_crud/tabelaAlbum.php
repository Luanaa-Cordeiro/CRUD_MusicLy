<?php
require('../database/config_art.php');
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                $sql = "SELECT a.id_album, a.nome AS nome, a.data_lanc as Lançamento, ar.nome AS artista
                FROM album AS a
                JOIN artista AS ar ON a.id_artista = ar.id_artista";
                $resultado = $conn->prepare($sql);
                $resultado->execute();
                $albuns = $resultado->fetchAll(PDO::FETCH_ASSOC);
                if(count($albuns) > 0){
                ?>

                <h1>Álbuns</h1>
                <button class="btn adicionar"><a href="formAlbum.php">Adicionar</a></button>
                </div>
                <?php
                    if(isset($_GET['delete'])) {
                      echo '<div class="alert-success alert alert-dismissible">
                      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                      <strong>Sucesso!</strong> Um álbum foi deletada.
                      </div>
                      ';
                    } elseif(isset($_GET['adicionado'])) {
                      echo '<div  class="alert-success alert alert-dismissible">
                      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                      <strong>Sucesso!</strong> Um álbum foi adicionado.
                      </div>
                      ';
                    } elseif(isset($_GET['atualizado'])) {
                      echo '<div class=" alert-success  alert alert-dismissible">
                      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                      <strong>Sucesso!</strong> Um álbum foi atualizado.
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
                      <th style="background-color:#66276A; color:white;">Lançamento</th>
                      <th style="background-color:#66276A; color:white;">Artista</th>
                      <th style="background-color:#66276A; color:white;"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      foreach($albuns as $album){
                        echo "<tr>";
                        echo "<td>" . $album['id_album'] . "</td>";
                        echo "<td>" . $album['nome'] . "</td>";
                        echo "<td>" . $album['Lançamento'] . "</td>";
                        echo "<td>" . $album['artista'] . "</td>";
                        echo "<td id='botoes'>
                        
                        <button type='submit' class ='btn deletar' data-bs-toggle='modal'
                        data-bs-target='#modalDeletar" . $album['id_album'] . "'>Deletar</button>";

                        echo "
                        <form id='form_atualizar' method ='post' action='./atualizar/receberValoresAlb.php'>
                        <input type='hidden' name='id' value='" . $album['id_album'] . "'/>
                        <input type='hidden' name='nome' value='" . $album['nome'] . "'/>
                        <input type='hidden' name='data' value='" . $album['Lançamento'] . "'/>
                        <input type='hidden' name='artista' value='" . $album['artista'] . "'/>
                        <button type='submit' class ='btn atualizar'>Atualizar</button>
                        </form>";
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
            echo "<h1>Álbuns</h1>
            <button class='btn botao_vazio'><a href='formAlbum.php'>Adicionar</a></button>";
            echo"</div>";
            echo "<h2>Você não tem nenhum álbum cadastrado!</h2>";
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
 
    <?php foreach ($albuns as $album) {?>
    <div class="modal fade" id="modalDeletar<?php echo $album['id_album'];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Deletar Álbum</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id='form_deletar' method ='post' action='./deletar/album.php'>
            <input type='hidden' name='id' value="<?php echo $album['id_album']?>"/>
            <input type='hidden' name='nome' value="<?php echo $album['nome']?>"/>
            <input type='hidden' name='data' value="<?php echo $album['Lançamento']?>"/>
            <input type='hidden' name='artista' value="<?php echo $album['artista']?>"/>
    <span>Deseja realmente excluir esse álbum?</span>
      </div>
      <div class="modal-footer">
        <button id="botao_modal" type="submit" class="btn btn-primary">Excluir</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php }?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="script.js"></script>
  </body>
</body>
</html>