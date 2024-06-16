<?php
require('../database/config_art.php');
session_start();

if(!isset($_SESSION["id_info"])){
    header("Location: ../login/login.php");

    
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

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Álbum', 'Quantidade'],
                <?php
                    $sql = "SELECT a.nome AS Album, COUNT(m.id_musica) AS contIDcat
                            FROM musicas AS m
                            JOIN album AS a ON m.id_album = a.id_album
                            GROUP BY a.id_album
                            ORDER BY contIDcat DESC
                            LIMIT 3";
                    $resultado = $conn->prepare($sql);
                    $resultado->execute();
                    $relatorios = $resultado->fetchAll(PDO::FETCH_ASSOC);
                    foreach($relatorios as $relatorio){
                        echo "['" . $relatorio['Album'] . "', " . $relatorio['contIDcat'] . "],";
                    }
                ?>
            ]);

            var options = {
                is3D: false,
                pieHole: 0.0
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
        }
    </script>
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
                    <a href="relatorioArtista.php" class="sidebar-link active collapsed has-dropdown" data-bs-toggle="collapse"
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
                            <a href="relatorioAlbum.php" class="sidebar-link active">Álbum</a>
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
                                <button id="sair" data-bs-toggle="modal" data-bs-target="#modalSair">Sair</button>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <?php
              $sql = "SELECT * from testeRelatorio where contIDcat = (
                SELECT count(m.id_musica) as contIDcat from musicas as m join artista as ar on m.id_artista = ar.id_artista group by ar.id_artista order by contIDcat desc limit 1)";
                $resultado = $conn->prepare($sql);
                $resultado->execute();
                $relatorios = $resultado->fetchAll(PDO::FETCH_ASSOC);
                if(count( $relatorios) > 0){
                ?>

            <div class="main_grafico">
            <h1>Álbum com mais músicas!</h1>
                <div class="shadow grafico_pizza">
                    <div id="piechart"></div>
                </div>
                <div id="voltar">
                <a href="relatorioAlbum.php"><button>Voltar</button></a>
                </div>
            </div>
    <?php
        } else{
            echo"<div class='main_vazio'>";
            echo"<div class='vazio'>";
            echo"<div class='elementos_vazios'>";
            echo "<h1>Artista com mais músicas</h1>
            <button class='btn botao_vazio'><a href='formMusica.php'>Adicionar</a></button>";
            echo"</div>";
            echo "<h2>Você não tem nenhuma música cadastrada!</h2>";
            echo"</div>";
            echo"<div>";
        }
        ?>
    



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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="../script.js"></script>
  </body>
</body>
</html>