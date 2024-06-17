<?php
if(isset($_POST["nome"])){
require('../../database/config_art.php');
$nome = trim($_POST["nome"]);

if(!empty($nome)){
    $stmt = $conn->prepare('SELECT COUNT(*) FROM genero WHERE nome = :nome');
    $stmt->bindValue(':nome', $nome);
    $stmt->execute();
    $count = $stmt->fetchColumn();
    
    if($count > 0){
        header("Location: ../formGenero.php?nome=existe");
    
    } else {
        $sql = 'INSERT INTO genero(nome) VALUES(:nome)';
        $resultado = $conn->prepare($sql);
        $resultado -> bindValue(':nome',$nome);
        $resultado->execute();
        
        header("Location: ../tabelaGenero.php?adicionado=ok&nome=$nome");
    }

} else{
    header("Location: ../formGenero.php?preencha=vazio");
}


} else{
    header("Location: ../tabelaGenero.php?algo=erro");
}