<?php
    include "../db.php";
    $resposta = $conn->query("SELECT * FROM chamado");
    $chamados = array();

    while($row = $resposta->fetch_assoc()) {
        array_push($chamados, $row);
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
    <?php foreach ($chamados as $chamado): ?>
    <div>
        <p>Id do Cliente: <?= $chamado["cliente_id"]?> </p>
        <p>Descrição: <?= $chamado["descricao"]?> </p>
        <p>Criticidade: <?= $chamado["criticidade"]?> </p>
        <p>Status: <?= $chamado["status"]?></p>
        <p>Data da Abertura: <?= $chamado["data_abertura"]?> </p>
        <p>Id do Colaborador: <?= $chamado["id_colaborador"]?></p>
        <a href="update.php?id=<?= $chamado["id"]?>">Alterar</a>
    </div>
    <hr>
    <?php endforeach ?>
</body>
</html>