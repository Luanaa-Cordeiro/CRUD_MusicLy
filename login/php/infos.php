<?php
if(isset($_POST["usuario"]) && isset($_POST["senha"]) && !empty($_POST["usuario"]) && !empty($_POST["senha"])){
            session_start();
            require("../../database/config_log.php");
            $usuario = $_POST["usuario"];
            $senha = $_POST["senha"];

            $sql = "SELECT * FROM infos WHERE usuario = :usuario AND senha = :senha";
            $resultado = $conn->prepare($sql);
            $resultado -> bindValue('usuario',$usuario);
            $resultado -> bindValue('senha',$senha);
            $resultado -> execute();

            if($resultado->rowCount() > 0){
                $dado = $resultado->fetch();

                $_SESSION["id_info"] = $dado["id_info"];

                header("Location: ../../pag_crud/navbar.php");
            } else{
                header("Location: ../../index.php?incorreto=erro");
            }
    }