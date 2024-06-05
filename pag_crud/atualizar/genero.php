<?php

if (isset($_POST["id"])) {
    require("../../database/config_art.php");
    $nome = $_POST["nome"];
    $id_genero = $_POST["id"];

    $stmt= $conn->prepare('SELECT COUNT(*) FROM genero WHERE nome = :novo_nome AND id_genero != :id_genero');
    $stmt->bindValue(':novo_nome', $nome);
    $stmt->bindValue(':id_genero', $id_genero);
    $stmt->execute();
    $count = $stmt->fetchColumn();

    if($count > 0) {
        header("Location: receberValoresGenErro.php?id=$id_genero&&nome= ");
    }


    $sql = "UPDATE genero SET nome = :nome WHERE id_genero = :id_genero";
    $resultado = $conn->prepare($sql);
    $resultado->bindValue(":nome", $nome);
    $resultado->bindValue(":id_genero", $id_genero);
    $resultado->execute();

    header("Location: ../tabelaGenero.php?atualizado=ok");
}
?>