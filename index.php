<?php
session_start();
require_once("conexao.php");

$sql = "SELECT * FROM tarefas";
$tarefas = mysqli_query($conn, $sql);

if (!$tarefas) {
    die("Erro na consulta: " . mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="container">
        <nav class="navbar bg-secondary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <i class="bi bi-card-checklist"></i>
                    TwoDo
                </a>
                <a href="tarefa_create.php" class="btn btn-primary"><i class="bi bi-plus-lg"></i></a>
            </div>
        </nav>
        <?php if ($tarefas->num_rows > 0): ?>
            <?php while ($row = $tarefas->fetch_assoc()): ?>
                <div class="card mt-2" style="width: 18rem;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?php echo ($row['nomeTarefa']); ?></h5>
                        <p class="card-text"><?php echo ($row['descricao']); ?></p>
                        <div class="row">
                            <hr style="border: 5px solid <?php
                            echo $row['statusTarefa'] === 'concluido' ? 'green' :
                                ($row['statusTarefa'] === 'em andamento' ? 'yellow' :
                                    ($row['statusTarefa'] === 'pendente' ? 'gray' : ''));
                            ?>">
                        </div>
                        <div class="row">
                            <div class="col">
                                <?php echo ($row['data_criacao']); ?>
                            </div>
                            <div class="col">
                                <?php echo ($row['data_limite']); ?>
                            </div>
                            <div class="col">
                                <a href="tarefa_edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Editar Tarefa</a>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <input type="radio" class="btn-check" name="botaoConcluir"
                                id="txtConcluirTarefa_<?php echo $row['id']; ?>" autocomplete="off" checked>
                            <label class="btn btn-outline-success" for="txtConcluirTarefa<?php echo $row['id']; ?>">Concluir
                                Tarefa</label>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>Nenhuma tarefa encontrada.</p>
        <?php endif; ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
</body>

</html>