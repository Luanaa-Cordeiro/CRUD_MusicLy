<?php

if(isset($_POST["id"])){
    require ("../../database/config_art.php");
    $nome = $_POST["nome"];
    $id_genero = $_POST["id"];

    $sql = "DELETE FROM genero WHERE id_genero = :id_genero";
    $resultado = $conn->prepare($sql);
    $resultado->bindValue(":id_genero", $id_genero);
    $resultado->execute();

    header("Location: ../tabelaGenero.php?delete=ok");
}else{
    header("Location: ../tabelaGenero.php?algo=erro"); 
}