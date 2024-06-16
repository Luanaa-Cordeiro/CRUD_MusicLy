<?php
if(isset($_POST["nome"])  && isset($_POST["data"])  && isset($_POST["artista"])  && isset($_POST["genero"]) && isset($_POST["album"])){
require('../../database/config_art.php');
$nome = trim($_POST["nome"]);
$data = trim($_POST["data"]);
$artista = trim($_POST["artista"]);
$genero = trim($_POST["genero"]);
$album = trim($_POST["album"]);

if(!empty($nome) && !empty($data) && !empty($artista) && !empty($genero) && !empty($album)){
    $stmt = $conn->prepare('SELECT COUNT(*) FROM musicas WHERE nome = :nome');
    $stmt->bindValue(':nome', $nome);
    $stmt->execute();
    $count = $stmt->fetchColumn();
    
    if($count > 0){
        header("Location: ../formMusica.php?nome=existe");
    } else {
        $sql = 'INSERT INTO musicas(nome,data_lanc,id_artista,id_genero,id_album) VALUES(:nome, :data_lanc, :artista, :genero, :album)';
        $resultado = $conn->prepare($sql);
        $resultado -> bindValue(':nome',$nome);
        $resultado -> bindValue(':data_lanc',$data);
        $resultado -> bindValue(':artista',$artista);
        $resultado -> bindValue(':genero',$genero);
        $resultado -> bindValue(':album',$album);
        $resultado->execute();
        header("Location: ../tabelaMusica.php?adicionado=ok");
    }

} else{
    header("Location: ../formMusica.php?preencha=vazio");
}

} else{
    header("Location: ../tabelaMusica.php?algo=erro");
}