<?php
if(isset($_POST["nome"]) && !empty($_POST["nome"])){
require('../../database/config_art.php');

$nome = $_POST["nome"];

$sql = 'INSERT INTO artista(nome) VALUES(:nome)';
$resultado = $conn->prepare($sql);
$resultado -> bindValue(':nome',$nome);
$resultado->execute();

header("Location: ../navbar.php");
}