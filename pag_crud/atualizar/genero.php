<?php

if(isset($_GET["id"]) && isset($_GET["nome"])) {
    $nome = trim($_GET["nome"]);
    $id_genero = trim($_GET["id"]);

    if(!empty($nome) && !empty($id_genero)){
    require("../../database/config_art.php");
    $stmt= $conn->prepare('SELECT COUNT(*) FROM genero WHERE nome = :novo_nome AND id_genero != :id_genero');
    $stmt->bindValue(':novo_nome', $nome);
    $stmt->bindValue(':id_genero', $id_genero);
    $stmt->execute();
    $count = $stmt->fetchColumn();

    if($count > 0) {
        header("Location: receberValoresGenErro.php?id=$id_genero&&nome= ");
    } else {
        $sql = "UPDATE genero SET nome = :nome WHERE id_genero = :id_genero";
        $resultado = $conn->prepare($sql);
        $resultado->bindValue(":nome", $nome);
        $resultado->bindValue(":id_genero", $id_genero);
        $resultado->execute();
        header("Location: ../tabelaGenero.php?atualizado=ok");
    }

    } else {
        header("Location: ./receberValoresGen.php?preencha=vazio&&id=$id_genero&&nome=$nome");
    }
    
} else{
    header("Location: ../tabelaGenero.php?algo=erro");
}
   


