<?php

if (isset($_POST["id"])) {
    require("../../database/config_art.php");
    $nome = $_POST["nome"];
    $id_artista = $_POST["id"];

    $sql = "UPDATE artista SET nome = :nome WHERE id_artista = :id_artista";
    $resultado = $conn->prepare($sql);
    $resultado->bindValue(":nome", $nome);
    $resultado->bindValue(":id_artista", $id_artista);
    $resultado->execute();

    header("Location: ../tabelaArtista.php");
}
?>


$sql = "SELECT COUNT(id_artista) FROM artista";
$resultado = $conn->prepare($sql);
$resultado->execute();
$artistas = $resultado->fetchAll(PDO::FETCH_ASSOC);