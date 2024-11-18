<?php
    include "../db.php";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['cliente_id']) && isset($_POST['descricao']) && isset($_POST['criticidade'])&& ($_POST['status'])&& ($_POST['data_abertura'])&& ($_POST['id_colaborador'])) {
            $cliente_id = $_POST['cliente_id'];
            $descricao = $_POST['descricao'];
            $criticidade = $_POST['criticidade'];
            $status = $_POST['status'];
            $data_abertura = $_POST['data_abertura'];
            $id_colaborador = $_POST['id_colaborador'];
            $conn->query("INSERT INTO chamado (cliente_id, descricao,criticidade,status,data_abertura,id_colaborador) VALUES ('$cliente_id', '$descricao','$criticidade','$status','$data_abertura','$id_colaborador')");            
        }
    }
    $conn->close();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>
<body>
    <form method="POST">
        <label for="id">Id do Cliente:</label>
        <input type="text" id="cliente_id" name="cliente_id" required>
        <label for="descricao">Descrição:</label>
        <input type="text" id="descricao" name="descricao" required>
        <label for="criticidade">Criticidade:</label>
        <input type="text" id="criticidade" name="criticidade" required>
        <label for="status">Status:</label>
        <input type="text" id="status" name="status" required>
        <label for="data_abertura">Data de Abertura:</label>
        <input type="date" id="data_abertura" name="data_abertura" required>
        <label for="id_colaborador">Id do Colaborador:</label>
        <input type="text" id="id_colaborador" name="id_colaborador" required>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>