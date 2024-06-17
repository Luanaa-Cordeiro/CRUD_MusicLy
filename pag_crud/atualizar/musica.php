<?php
if(isset($_GET["id"]) && isset($_GET["nome"]) && isset($_GET["data"]) && isset($_GET["artista"]) 
&& isset($_GET["album"]) && isset($_GET["genero"]) ){
    $id_musica = trim($_GET["id"]);
    $nome = trim($_GET["nome"]);
    $data = trim($_GET["data"]);
    $id_artista = trim($_GET["artista"]);
    $id_album = trim($_GET["album"]);
    $id_genero = trim($_GET["genero"]);

    if(!empty($id_musica) && !empty($nome) && !empty($data) && !empty($id_artista) && !empty($id_artista) && !empty($id_artista)){
    require("../../database/config_art.php");
    $stmt= $conn->prepare('SELECT COUNT(*) FROM musicas WHERE nome = :nome AND id_musica != :id_musica');
    $stmt->bindValue(':nome', $nome);
    $stmt->bindValue(':id_musica', $id_musica);
    $stmt->execute();
    $count = $stmt->fetchColumn();
    
    if($count > 0) {
        header("Location: receberValoresMusErro.php?id=$id_musica&&data=$data&&album=$id_album&&artista=$id_artista&&genero=$id_genero&&nome= ");
    } else {
        $sql = "UPDATE musicas SET nome = :nome, data_lanc = :data_lanc, id_artista = :id_artista, id_album = :id_album, id_genero = :id_genero WHERE id_musica = :id_musica";
        $resultado = $conn->prepare($sql);
        $resultado->bindValue(":nome", $nome);
        $resultado->bindValue(":id_musica", $id_musica);
        $resultado->bindValue(":data_lanc", $data);
        $resultado->bindValue(":id_artista", $id_artista);
        $resultado->bindValue(":id_album", $id_album);
        $resultado->bindValue(":id_genero", $id_genero);
        $resultado->execute();
        header("Location: ../tabelaMusica.php?atualizado=ok");
        }

    } else {
        header("Location: receberValoresMus.php?preencha=vazio&&id=$id_musica&&nome=$nome&&data=$data&&artista=$id_artista&&album=$id_album&&genero=$id_genero");
    }
} else{
    header("Location: ../tabelaMusica.php?algo=erro");
}

