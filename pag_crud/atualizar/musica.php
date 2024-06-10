<?php

if (isset($_POST["id"]) && !empty($_POST["id"]) && 
    isset($_POST["nome"]) && !empty($_POST["nome"]) && 
    isset($_POST["data"]) && !empty($_POST["data"]) && 
    isset($_POST["artista"]) && !empty($_POST["artista"])) {
    require("../../database/config_art.php");

    $id_musica = trim($_POST["id"]);
    $nome = trim($_POST["nome"]);
    $data = trim($_POST["data"]);
    $id_artista = trim($_POST["artista"]);
    $id_album = trim($_POST["album"]);
    $id_genero = trim($_POST["genero"]);


    $stmt= $conn->prepare('SELECT COUNT(*) FROM musicas WHERE nome = :nome AND id_musica != :id_musica');
    $stmt->bindValue(':nome', $nome);
    $stmt->bindValue(':id_musica', $id_musica);
    $stmt->execute();
    $count = $stmt->fetchColumn();

    if($count > 0) {
        header("Location: receberValoresMusErro.php?id=$id_musica&&nome= &&data=$data&&album=$id_album&&artista=$id_artista&&genero=$id_genero");
    } else{
        $sql = "UPDATE musicas SET nome = :nome, data_lanc = :data_lanc, id_artista = :id_artista, id_album = :id_album, id_genero = :id_genero WHERE id_musica = :id_musica";
        $resultado = $conn->prepare($sql);
        $resultado->bindValue(":nome", $nome);
        $resultado->bindValue(":id_musica", $id_musica);
        $resultado->bindValue(":data_lanc", $data);
        $resultado->bindValue(":id_artista", $id_artista);
        $resultado->bindValue(":id_album", $id_album);
        $resultado->bindValue(":id_genero", $id_genero);
        $resultado->execute();
    
        header("Location: ../tabelaMusica.php?atualizado=ok");
    }
    }
