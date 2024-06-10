<?php
if(isset($_POST["nome"]) && !empty($_POST["nome"]) && isset($_POST["data"]) && !empty($_POST["data"])
&& isset($_POST["artista"]) && !empty($_POST["artista"])){
require('../../database/config_art.php');

$nome = trim($_POST["nome"]);
$data = trim($_POST["data"]);
$artista = trim($_POST["artista"]);

$stmt = $conn->prepare('SELECT COUNT(*) FROM album WHERE nome = :nome');
$stmt->bindValue(':nome', $nome);
$stmt->execute();
$count = $stmt->fetchColumn();

if($count > 0){
    header("Location: ../formAlbum.php?nome=existe");

} else{
$sql = 'INSERT INTO album(nome, data_lanc, id_artista) VALUES(:nome, :data_lanc, :id_artista)';
$resultado = $conn->prepare($sql);
$resultado -> bindValue(':nome',$nome);
$resultado -> bindValue(':data_lanc',$data);
$resultado -> bindValue(':id_artista',$artista);
$resultado->execute();

header("Location: ../tabelaAlbum.php?adicionado=ok");
}


} else{
    header("Location: ../formAlbum.php?preencha=vazio");
}