<?php
    include "./connection.php";
    
    
    function pegar_cliente($conn, $id) {
        $novo_cliente = null;
        $resposta = $conn->query("SELECT * FROM cliente WHERE id = '$id'");
        if ($resposta->num_rows > 0) {
            $novo_cliente = $resposta->fetch_assoc();
        }

        return $novo_cliente;
    }

    $user = null;
    if (isset($_GET['id'])) {
        $id = (int) $_GET['id'];
        $cliente = pegar_cliente($conn, $id);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['telefone'])) {
                $nome = $_POST['nome'];
                $email = $_POST['email'];
                $telefone = $_POST['telefone'];
                $conn->query("UPDATE cliente SET nome = '$nome', email = '$email', telefone = '$telefone' WHERE id = '$id'");
                
            }
        }
    }

    $conn->close();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<body>
    <?php if ($cliente == null): ?>
        <h1>Cliente invalido </h1>    
    <?php else: ?>
        <form method="POST">
        <label for="name">Nome:</label>
        <input type="text" id="nome" name="nome" required>
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>
        <label for="telefone">Telefone:</label>
        <input type="tel" id="telefone" name="telefone" required>
        <button type="submit">Atualizar</button>
    </form>
    <?php endif ?>
</body>
</html>