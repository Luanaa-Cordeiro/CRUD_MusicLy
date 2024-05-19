<?php
$servername = "localhost";
$username = "root";
$password = "";
$name = "catalogo_musicas";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$name", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Erro: " . $e->getMessage();
}