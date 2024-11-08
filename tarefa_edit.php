<?php
session_start();
require_once('conexao.php');

$tarefa = [];

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('Location: index.php');
} else {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM tarefas WHERE id = '{$id}'";
    $query = mysqli_query($conn, $sql);

    if (mysqli_num_rows($query) > 0) {
        $tarefa = mysqli_fetch_array($query);
    } else {
        echo "Tarefa não encontrada";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar - Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="card-header rounded" style="background-color: #000; padding: 10px;">
            <h4 style="color: #fff; margin-top: 5px;">Editar Tarefa</h4>
        </div>

        <div class="card-body border border-1 rounded">
            <?php if (!empty($tarefa)): ?>
                <form action="acoes.php" method="POST">
                    <input type="hidden" name="id" value="<?= $tarefa['id']; ?>">
                    <div class="d-flex justify-content-end" style="margin-top: 20px;">
                        <button type="submit" name="edit_tarefa" class="btn btn-primary">Salvar Alterações</button>
                    </div>
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" name="nomeTarefa" class="form-control" id="nome"
                            value="<?= $tarefa['nomeTarefa'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <input type="text" name="descricao" class="form-control" id="descricao"
                            value="<?= $tarefa['descricao'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="status" id="status" required>
                            <option value="pendente" <?= $tarefa['statusTarefa'] == 'pendente' ? 'selected' : '' ?>>Pendente
                            </option>
                            <option value="em andamento" <?= $tarefa['statusTarefa'] == 'em andamento' ? 'selected' : '' ?>>Em
                                Andamento</option>
                            <option value="concluido" <?= $tarefa['statusTarefa'] == 'concluido' ? 'selected' : '' ?>>Concluída
                            </option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="data_limite">Data Limite</label>
                        <input type="date" name="data_limite" id="data_limite" class="form-control"
                            value="<?= $tarefa['data_limite'] ?>" required>
                    </div>
                </form>
            <?php else: ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Tarefa não encontrada.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>