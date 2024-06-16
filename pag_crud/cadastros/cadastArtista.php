<?php
if(isset($_POST["nome"])){
require('../../database/config_art.php');
$nome = trim($_POST["nome"]);

if(!empty($nome)){
    $stmt = $conn->prepare('SELECT COUNT(*) FROM artista WHERE nome = :nome');
    $stmt->bindValue(':nome', $nome);
    $stmt->execute();
    $count = $stmt->fetchColumn();
    
    if($count > 0){
        header("Location: ../formArtista.php?nome=existe");
    
    }else{
        $sql = 'INSERT INTO artista(nome) VALUES(:nome)';
        $resultado = $conn->prepare($sql);
        $resultado -> bindValue(':nome',$nome);
        $resultado->execute();
    
        header("Location: ../tabelaArtista.php?adicionado=ok");
    }

} else {
    header("Location: ../formArtista.php?preencha=vazio");
}

} else{
    header("Location: ../tabelaArtista.php?algo=erro");
}