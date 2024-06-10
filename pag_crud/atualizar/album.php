<?php

if (isset($_POST["id"]) && !empty($_POST["id"]) && 
    isset($_POST["nome"]) && !empty($_POST["nome"]) && 
    isset($_POST["data"]) && !empty($_POST["data"]) && 
    isset($_POST["artista"]) && !empty($_POST["artista"])) {
    require("../../database/config_art.php");

    $id_album = trim($_POST["id"]);
    $nome = trim($_POST["nome"]);
    $data = trim($_POST["data"]);
    $id_artista = trim($_POST["artista"]);

    $stmt= $conn->prepare('SELECT COUNT(*) FROM album WHERE nome = :nome AND id_album != :id_album');
    $stmt->bindValue(':nome', $nome);
    $stmt->bindValue(':id_album', $id_album);
    $stmt->execute();
    $count = $stmt->fetchColumn();

    if($count > 0) {
        header("Location: receberValoresAlbErro.php?id=$id_album&&nome= &&data=$data&&artista=$id_artista");
    }


    $sql = "UPDATE album SET nome = :nome, data_lanc = :data_lanc, id_artista = :id_artista WHERE id_album = :id_album";
    $resultado = $conn->prepare($sql);
    $resultado->bindValue(":nome", $nome);
    $resultado->bindValue(":data_lanc", $data);
    $resultado->bindValue(":id_artista", $id_artista);
    $resultado->bindValue(":id_album", $id_album);
    $resultado->execute();
    header("Location: ../tabelaAlbum.php?atualizado=ok");
}

