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
                $sql = "SELECT m.id_musica, m.nome, m.data_lanc as Lançamento, ar.nome as Artista, a.nome as Álbum, g.nome as Gênero from musicas as m join artista as ar on m.id_artista = ar.id_artista join album as a on m.id_album = a.id_album join genero as g on m.id_genero = g.id_genero";
                $resultado = $conn->prepare($sql);
                $resultado->execute();
                $musicas = $resultado->fetchAll(PDO::FETCH_ASSOC);
                if(count($musicas ) > 0){
                ?>

                <h1>Músicas</h1>
                <button class="btn adicionar"><a href="formMusica.php">Adicionar</a></button>
                </div>
                <?php
                    if(isset($_GET['delete'])) {
                      echo '<div class="alert-success alert alert-dismissible">
                      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                      <strong>Sucesso!</strong> Uma música foi deletada.
                      </div>
                      ';
                    } elseif(isset($_GET['adicionado'])) {
                      echo '<div  class="alert-success alert alert-dismissible">
                      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                      <strong>Sucesso!</strong> Uma música foi adicionada.
                      </div>
                      ';
                    } elseif(isset($_GET['atualizado'])) {
                      echo '<div class=" alert-success  alert alert-dismissible">
                      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                      <strong>Sucesso!</strong> Uma música foi atualizada.
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
                      <th style="background-color:#66276A; color:white;">Álbum</th>
                      <th style="background-color:#66276A; color:white;">Gênero</th>
                      <th style="background-color:#66276A; color:white;"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      foreach($musicas  as $musica){
                        echo "<tr>";
                        echo "<td>" . $musica['id_musica'] . "</td>";
                        echo "<td>" . $musica['nome'] . "</td>";
                        echo "<td>" . $musica['Lançamento'] . "</td>";
                        echo "<td>" . $musica['Artista'] . "</td>";
                        echo "<td>" . $musica['Álbum'] . "</td>";
                        echo "<td>" . $musica['Gênero'] . "</td>";
                        echo "<td id='botoes'>
                        <button type='submit' class ='btn deletar' data-bs-toggle='modal'
                        data-bs-target='#modalDeletar" . $musica['id_musica'] . "'>Deletar</button>";

                        echo "
                        <form id='form_atualizar' method ='post' action='./atualizar/receberValoresMus.php'>
                        <input type='hidden' name='id' value='" . $musica['id_musica'] . "'/>
                        <input type='hidden' name='nome' value='" . $musica['nome'] . "'/>
                        <input type='hidden' name='data' value='" . $musica['Lançamento'] . "'/>
                        <input type='hidden' name='artista' value='" . $musica['Artista'] . "'/>
                        <input type='hidden' name='album' value='" . $musica['Álbum'] . "'/>
                        <input type='hidden' name='genero' value='" . $musica['Gênero'] . "'/>
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
            echo "<h1>Músicas</h1>
            <button class='btn botao_vazio'><a href='formMusica.php'>Adicionar</a></button>";
            echo"</div>";
            echo "<h2>Você não tem nenhuma música cadastrada!</h2>";
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

    <?php foreach ($musicas as $musica) {?>
    <div class="modal fade" id="modalDeletar<?php echo $musica['id_musica'];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Deletar Música</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id='form_deletar' method ='post' action='./deletar/musica.php'>
        <input type='hidden' name='id' value=" <?php echo $musica['id_musica'] ?> "/>
        <input type='hidden' name='nome' value="<?php echo $musica['nome'] ?>"/>
        <span>Deseja realmente excluir essa música?</span>
      </div>
      <div class="modal-footer">
        <button id="botao_modal" type="submit" class="btn">Excluir</button>
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