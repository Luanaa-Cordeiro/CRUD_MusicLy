<?php

if (isset($_POST["id"])) {
    require("../../database/config_art.php");
    $nome = $_POST["nome"];
    $id_genero = $_POST["id"];

    $sql = "UPDATE genero SET nome = :nome WHERE id_genero = :id_genero";
    $resultado = $conn->prepare($sql);
    $resultado->bindValue(":nome", $nome);
    $resultado->bindValue(":id_genero", $id_genero);
    $resultado->execute();

    header("Location: ../tabelaGenero.php");
}
?>