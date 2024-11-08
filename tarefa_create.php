<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar tarefas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

    <div class="container mt-5">
        <div class="card-header border-1 border" style="background-color: #000;">
            <h4 style="color: #fff; margin-top: 5px;"> Criar nova tarefa</h4>
        </div>

        <div class="card-body">
            <form action="acoes.php" method="POST">
                <div class="d-flex justify-content-end mb-3">
                    <button type="submit" name="create_tarefa" class="btn btn-primary">Adicionar Tarefa</button>
                </div>
                <div class="form-group">
                    <label for="nome">Nome da Tarefa</label>
                    <input type="text" class="form-control" id="nomeTarefa" name="nomeTarefa" required>
                </div>
                <div class="form-group">
                    <label for="descricao">Descriçao da Tarefa</label>
                    <input type="text" class="form-control" id="descricao" name="descricao">
                </div>
                <div class="form-group">
                    <label for="statusTarefa">Status</label>
                    <select class="form-control" id="statusTarefa" name="statusTarefa">
                        <option value="pendente">Pendente</option>
                        <option value="em andamento">Em andamento</option>
                        <option value="concluido">Concluída</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="data_limite">Data Limite</label>
                    <input type="date" class="form-control" id="data_limite" name="data_limite">
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>