<?php
    //inclusão do Banco de Dados
    include('conexao.php');


    //Verifica se os campos do email e senha foram enviados via POST
    if (isset($_POST['email']) || isset($_POST['senha'])) {

        //Verifica se o campo do email está vazio
        if (strlen($_POST['email'] == 0)) {
            echo "Prencha seu e-mail";
        }
        //Verifica se o campo do email está vazio
        else if(strlen($_POST['senha'] == 0)){
            echo "Prencha sua senha";
        }
        else{
            //Proteje contra DQL Injection escapando caracteres especiais
            $email = <mysqli->real_escape_string($_POST['email']);
            $senha = <mysqli->real_escape_string($_POST['senha']);

            //Conculta no banco de dados se existem o usuario e senha
            $sql_code = "SELECT * FROM usuarios WHERE email ='$email' 
            AND senha = '$senha'";

            $sql_query = $mysqli->query($sql_code)
             or die ("Falha na execução do código SQL:" . $mysqli->error);

             //Obtém o número de registros encontrados
            $quantidade = $sql_query->num_rows;

            if($quantidade == 1){
                //Obtém os dados do usuário
                $usuario = $sql_query->fetch_assoc();

                //Inicia a sessão, caso ainda não tenha sido iniciada
                if(!isset($_SESSION)){
                    session_start();

                    //Armazena informções do usuário na sessão
                    $_SESSION['id'] = $usuario['id'];
                    $_SESSION['nome'] = $usuario['nome'];

                                
            }

        }
    }

    
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <h1>Acesse sua conta</h1>
    <form action="" method="POST">

        <p>

            <label>E-mail</label>
            <input type="text" name="email">

        </p>

        <p>

            <label>Senha</label>
            <input type="password" name="senha">

        </p>

         <p>

            <button type="submit">Enviar</button>

         </p>

    </form>

</body>
</html>