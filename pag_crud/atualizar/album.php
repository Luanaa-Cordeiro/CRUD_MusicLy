<?php

if(isset($_GET["id"]) && isset($_GET["nome"]) && isset($_GET["data"]) && isset($_GET["artista"])) {
    $id_album = trim($_GET["id"]);
    $nome = trim($_GET["nome"]);
    $data = trim($_GET["data"]);
    $id_artista = trim($_GET["artista"]);
    if (!empty($id_album) && !empty($nome) &&  !empty($data) &&  !empty($id_artista)) {
        require("../../database/config_art.php");
        $stmt= $conn->prepare('SELECT COUNT(*) FROM album WHERE nome = :nome AND id_album != :id_album');
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':id_album', $id_album);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        if($count > 0) {
            header("Location: receberValoresAlbErro.php?id=$id_album&&nome= &&data=$data&&artista=$id_artista");
        } else {
            $sql = "UPDATE album SET nome = :nome, data_lanc = :data_lanc, id_artista = :id_artista WHERE id_album = :id_album";
            $resultado = $conn->prepare($sql);
            $resultado->bindValue(":nome", $nome);
            $resultado->bindValue(":data_lanc", $data);
            $resultado->bindValue(":id_artista", $id_artista);
            $resultado->bindValue(":id_album", $id_album);
            $resultado->execute();
            header("Location: ../tabelaAlbum.php?atualizado=ok");
        }
       
    } else{
        header("Location: receberValoresAlb.php?preencha=vazio&id=$id_album&nome=$nome&data=$data&artista=$id_artista");
    }
} else{
    header("Location: ../tabelaAlbum.php?algo=erro");
}
