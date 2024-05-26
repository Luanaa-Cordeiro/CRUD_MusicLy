<?php
if(isset($_POST["nome"]) && !empty($_POST["nome"])){
require('../../database/config_art.php');

$nome = $_POST["nome"];

$sql = 'INSERT INTO genero(nome) VALUES(:nome)';
$resultado = $conn->prepare($sql);
$resultado -> bindValue(':nome',$nome);
$resultado->execute();

header("Location: ../tabelaGenero.php");
}