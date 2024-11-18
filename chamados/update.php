<?php
    include "./connection.php";
    
    
    function pegar_chamado($conn, $id) {
        $novo_chamado = null;
        $resposta = $conn->query("SELECT * FROM chamado WHERE id = '$id'");
        if ($resposta->num_rows > 0) {
            $novo_chamado = $resposta->fetch_assoc();
        }

        return $novo_chamado;
    }

    $user = null;
    if (isset($_GET['id'])) {
        $id = (int) $_GET['id'];
        $chamado = pegar_chamado($conn, $id);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['id_colaborador']) && isset($_POST['status'])) {
                $id_colaborador = $_POST['id_colaborador'];
                $status = $_POST['status'];
                $conn->query("UPDATE chamado SET id_colaborador = '$id_colaborador', status = '$status' WHERE id = '$id'");
                
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
    <?php if ($chamado == null): ?>
        <h1>Chamado invalido </h1>    
    <?php else: ?>
        <label for="status">Status:</label>
        <input type="text" id="status" name="status" required>
        <label for="id_colaborador">Id do Colaborador:</label>
        <input type="text" id="id_colaborador" name="id_colaborador" required>
        <button type="submit">Atualizar</button>
    </form>
    <?php endif ?>
</body>
</html>