<!doctype html>
<html lang="PT-br">
    <head>
        <meta charset="utf-8">
        <title>Lista de usuários</title>
    </head>
    <body>

        <table border="1">
            
            <caption>Usuários Cadastrados</caption>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Login</th>
                </tr>
            </thead>

            <?php

                require('dbConnection.php');

                session_start();

                if(!isset($_SESSION['login']) && !isset($_SESSION['senha'])){
                    header("Location: sair.php");
                }else{
                    require('listagem.php');
                }

            ?>

            </tbody>
            <a href="sair.php">sair</a>
        </table>

    </body>
</html>
