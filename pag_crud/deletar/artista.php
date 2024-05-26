<?php

if(isset($_POST["id"])){
    require ("../../database/config_art.php");
    $nome = $_POST["nome"];
    $id_artista = $_POST["id"];

    $sql = "DELETE FROM artista WHERE id_artista = :id_artista";
    $resultado = $conn->prepare($sql);
    $resultado->bindValue(":id_artista", $id_artista);
    $resultado->execute();

    header("Location: ../tabelaArtista.php");
}