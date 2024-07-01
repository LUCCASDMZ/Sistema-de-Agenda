<header>
    <h3>Status Tarefas</h3>
</header>

<?php 
    $idTarefa = mysqli_real_escape_string($conexao, $_GET['idTarefa']);

    $sql = "UPDATE dbsisagendador.tbtarefas SET statusTarefa = 0 WHERE (idTarefa = $idTarefa)";

    mysqli_query($conexao, $sql) or die ("Erro ao execultar a consulta.".mysqli_error($conexao));

    echo "A tarefa esta em andamento";

    mysqli_close($conexao);
?>