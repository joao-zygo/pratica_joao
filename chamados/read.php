<?php
    include "../db.php";
    $resposta = $conn->query("SELECT * FROM cliente");
    $clientes = array();

    while($row = $resposta->fetch_assoc()) {
        array_push($clientes, $row);
    }

    $conn->close();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read</title>
</head>
<body>
    <?php foreach ($clientes as $cliente): ?>
    <div>
        <p>Nome: <?= $cliente["name"]?> </p>
        <p>Email: <?= $cliente["email"]?> </p>
        <p>Telefone: <?= $cliente["telefone"]?> </p>
        <a href="update.php?id=<?= $cliente["id"]?>">Alterar</a>
    </div>
    <hr>
    <?php endforeach ?>
</body>
</html>