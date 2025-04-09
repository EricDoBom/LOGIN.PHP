<?php
include('protect.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Bem vindo ao Painel, <?php echo = $_SESSION['nome']; ?>.</h2>
    <p><a href="logout.php">Sair</a></p>
</body>
</html>