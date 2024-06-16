<?php
if (isset($_GET["id"]) && isset($_GET["nome"])){
    $nome = trim($_GET["nome"]);
    $id_artista = trim($_GET["id"]);

    if(!empty($_GET["id"]) && !empty($_GET["nome"])){
    require("../../database/config_art.php");
    $stmt= $conn->prepare('SELECT COUNT(*) FROM artista WHERE nome = :nome AND id_artista != :id_artista');
    $stmt->bindValue(':nome', $nome);
    $stmt->bindValue(':id_artista', $id_artista);
    $stmt->execute();
    $count = $stmt->fetchColumn();

    if($count > 0) {
        header("Location: receberValoresArtErro.php?id=$id_artista&&nome= ");
    } else{
        $sql = "UPDATE artista SET nome = :nome WHERE id_artista = :id_artista";
        $resultado = $conn->prepare($sql);
        $resultado->bindValue(":nome", $nome);
        $resultado->bindValue(":id_artista", $id_artista);
        $resultado->execute();
        header("Location: ../tabelaArtista.php?atualizado=ok");
        }

    }else{
        header("Location: receberValoresArt.php?preencha=vazio&&id=$id_artista&&nome=$nome");
    }
}  else{
    header("Location: ../tabelaArtista.php?algo=erro");
}


