<?php

if (isset($_POST["id"])) {
    require("../../database/config_art.php");
    $nome = $_POST["nome"];
    $id_artista = $_POST["id"];

    $stmt= $conn->prepare('SELECT COUNT(*) FROM artista WHERE nome = :nome AND id_artista != :id_artista');
    $stmt->bindValue(':nome', $nome);
    $stmt->bindValue(':id_artista', $id_artista);
    $stmt->execute();
    $count = $stmt->fetchColumn();

    if($count > 0) {
        header("Location: receberValoresArtErro.php?id=$id_artista&&nome= ");
    }


    $sql = "UPDATE artista SET nome = :nome WHERE id_artista = :id_artista";
    $resultado = $conn->prepare($sql);
    $resultado->bindValue(":nome", $nome);
    $resultado->bindValue(":id_artista", $id_artista);
    $resultado->execute();

    header("Location: ../tabelaArtista.php?atualizado=ok");
}
?>

