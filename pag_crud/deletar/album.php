<?php

if(isset($_POST["id"]) && !empty($_POST["id"])){
    require ("../../database/config_art.php");
    $nome = $_POST["nome"];
    $id_album = $_POST["id"];

    $sql = "DELETE FROM album WHERE id_album = :id_album";
    $resultado = $conn->prepare($sql);
    $resultado->bindValue(":id_album", $id_album);
    $resultado->execute();
    header("Location: ../tabelaAlbum.php?delete=ok&nome=$nome");
} else{
    header("Location: ../tabelaAlbum.php?algo=erro"); 
}