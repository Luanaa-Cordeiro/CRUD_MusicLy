<?php


    //if(isset($_POST["submit"])){
        if(isset($_POST["usuario"]) && isset($_POST["senha"]) && !empty($_POST["usuario"]) && !empty($_POST["senha"])){
            require("../../database/config_log.php");
            $usuario = $_POST["usuario"];
            $senha = $_POST["senha"];

            $sql = "INSERT INTO infos(usuario,senha) VALUES(:usuario,:senha)";
            $resultado = $conn->prepare($sql);
            $resultado -> bindValue('usuario',$usuario);
            $resultado -> bindValue('senha',$senha);
            $resultado -> execute();
            
            header("Location: ../../index.php?success=ok");
        }
    //}