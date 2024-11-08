<?php
session_start();
require_once('conexao.php');

if (isset($_POST['create_tarefa'])) {
    $nomeTarefa = trim($_POST['nomeTarefa']);
    $descricao = trim($_POST['descricao']);
    $statusTarefa = trim($_POST['statusTarefa']);
    $dataCriacao = trim($_POST['data_criacao']);
    $dataLimite = trim($_POST['data_limite']);


    $sql = "INSERT INTO tarefas (nomeTarefa, descricao, statusTarefa, data_criacao, data_limite) VALUES('$nomeTarefa',
     '$descricao', '$statusTarefa', '$data_criacao', '$data_limite')";

    mysqli_query($conn, $sql);

    header('Location: index.php');
    exit();
}

if (isset($_POST['delete_tarefa'])) {
    require_once('conexao.php');

    $id = mysqli_real_escape_string($conn, $_POST['delete_tarefa']);

    $sql = "DELETE FROM tarefas WHERE id = '$id'";
    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        $_SESSION['message'] = "A tarefa com o ID {$id} foi excluída com sucesso!";
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = "Não foi possível excluir a tarefa.";
        $_SESSION['type'] = 'error';
    }

    header('Location: index.php');
    exit;
}
if (isset($_POST['edit_tarefa'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $nomeTarefa = mysqli_real_escape_string($conn, $_POST['nomeTarefa']);
    $descricao = mysqli_real_escape_string($conn, $_POST['descricao']);
    $statusTarefa = mysqli_real_escape_string($conn, $_POST['statusTarefa']);
    $dataLimite = mysqli_real_escape_string($conn, $_POST['data_limite']);

    $sql = "UPDATE tarefas SET nomeTarefa = '{$nomeTarefa}', descricao = '{$descricao}', statusTarefa = '{$statusTarefa}',
     data_limite = '{$dataLimite}' WHERE id = '{$id}'";

    if (mysqli_query($conn, $sql)) {
        if (mysqli_affected_rows($conn) > 0) {
            $_SESSION['message'] = 'Tarefa editada com sucesso!';
            $_SESSION['type'] = 'success';
        } else {
            $_SESSION['message'] = 'Não foi possível editar a tarefa';
            $_SESSION['type'] = 'error';
        }
    } else {
        $_SESSION['message'] = 'Erro ao executar a atualização!';
        $_SESSION['type'] = 'error';
    }

    header("Location: index.php");
    exit;
}

