<?php

if(isset($_POST["id"]) && !empty($_POST["id"])){
    require ("../../database/config_art.php");
    $nome = $_POST["nome"];
    $id_musica = $_POST["id"];

    $sql = "DELETE FROM musicas WHERE id_musica = :id_musica";
    $resultado = $conn->prepare($sql);
    $resultado->bindValue(":id_musica", $id_musica);
    $resultado->execute();
    header("Location: ../tabelaMusica.php?delete=ok&nome=$nome");
} else{
    header("Location: ../tabelaMusica.php?algo=erro"); 
}