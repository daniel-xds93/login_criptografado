<?php

    require('dbConnection.php');

    $login = htmlspecialchars($_POST['txtLogin']);
    $senha = htmlspecialchars($_POST['txtSenha']);

    $sql = "SELECT * FROM usuario WHERE login = ?";

    if(!$stmt = $connection->prepare($sql)){
        die("Erro: ". $connection->error);
    }

    $stmt->bind_param("s", $login);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        
        while($row = $result->fetch_assoc()){
            
            $hash = $row["senha"];

            if(!password_verify($senha, $hash)){
                echo("<script>alert('Senha inválida!');</script>")
            }else{

                SESSION_START();
                $_SESSION['login'] = $login;
                $_SESSION['senha'] = $senha;

                header("location: listar.php");
            }
        }
    }else{
        echo("<h2>Verifique se o usuário e a senha estão corretos!</h2>");
    }

?>