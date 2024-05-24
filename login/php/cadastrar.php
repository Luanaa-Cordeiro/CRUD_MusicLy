<?php


    
        if(isset($_POST["usuario"]) && isset($_POST["senha"]) && !empty($_POST["usuario"]) && !empty($_POST["senha"]) && $_POST["senha"] == $_POST["confsenha"]){
            require("../../database/config_log.php");
            $usuario = $_POST["usuario"];
            $senha = $_POST["senha"];

            $stmt = $conn->prepare('SELECT COUNT(*) FROM infos WHERE usuario = :usuario');
            $stmt->bindParam(':usuario', $usuario);
            $stmt->execute();
            $count = $stmt->fetchColumn();

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
    