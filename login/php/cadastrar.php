<?php


    
        if(isset($_POST["usuario"]) && isset($_POST["senha"]) && isset($_POST["confsenha"]) &&  $_POST["senha"] == $_POST["confsenha"]){
            if(empty($_POST["usuario"]) || empty($_POST["senha"]) || empty($_POST["confsenha"])){
                header("Location: ../criar.php?preencha=erro");
            } else{
                require("../../database/config_log.php");
            $usuario = trim($_POST["usuario"]);
            $senha = trim($_POST["senha"]);
            $confsenha = trim($_POST["confsenha"]);

            $stmt = $conn->prepare('SELECT COUNT(*) FROM infos WHERE usuario = :usuario');
            $stmt->bindParam(':usuario', $usuario);
            $stmt->execute();
            $count = $stmt->fetchColumn();
            }
            
            
            

            if ($count > 0) {
                header("Location: ../criar.php?usuario=existe");
            } else{
                $sql = "INSERT INTO infos(usuario,senha) VALUES(:usuario,:senha)";
                $resultado = $conn->prepare($sql);
                $resultado -> bindValue('usuario',$usuario);
                $resultado -> bindValue('senha',$senha);
                $resultado -> execute();

                header("Location: ../../index.php?success=ok");
            }

        } else {
            header("Location: ../criar.php?senha=erro");
        }

        
    