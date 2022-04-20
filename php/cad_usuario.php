<?php
    require 'dbConnection.php';

    $nome = htmlspecialchars($_POST['txtNome']);
    $login = htmlspecialchars($_POST['txtLogin']);
    $senha = htmlspecialchars($_POST['txtSenha']);

    if(!empty($nome) && !empty($login) && !empty($senha)){
        $opcoes = [
            'cost' => 8,
        ];

        $senha = password_hash($senha, PASSWORD_BCRYPT, $opcoes);

        $sql = "INSERT INTO usuario (nome_usuario, login, senha) VALUES (?, ?, ?)";
        
        if(!$stmt = $connection->prepare($sql)){ die("Error prepare: ". $connection->error); }

        $stmt->bind_param("sss",$nome, $login, $senha);
        $stmt->execute();

        if(!$stmt){
            echo("stmt inválido");
            exit;
        }

        $stmt->close();

        echo("<script>alert('Cadastro efetuado com sucesso!');</script>");

    }else{
        echo("<script>alert('Campos obrigatórios')</script>");
    }

?>