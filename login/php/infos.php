<?php
if(isset($_POST["usuario"]) && isset($_POST["senha"]) && !empty($_POST["usuario"]) && !empty($_POST["senha"])){
            session_start();
            require("../../database/config_log.php");
            $usuario = trim($_POST["usuario"]);
            $senha = trim($_POST["senha"]);

            $sql = "SELECT * FROM infos WHERE usuario = :usuario AND senha = :senha";
            $resultado = $conn->prepare($sql);
            $resultado -> bindValue('usuario',$usuario);
            $resultado -> bindValue('senha',$senha);
            $resultado -> execute();

            if($resultado->rowCount() > 0){
                $dado = $resultado->fetch();

                $_SESSION["id_info"] = $dado["id_info"];
                $_SESSION["nome"] = $dado["usuario"];
                header("Location: ../../index.php");
            } else{
                header("Location: ../login.php?incorreto=erro");
            }
    } else{
        header("Location: ../login.php?preencha=erro");
    }