<header>
    <h3>status Tarefas</h3>
</header>

<?php 
    $idTarefa = mysqli_real_escape_string($conexao, $_GET['idTarefa']);

    $sql = "UPDATE dbsisagendador.tbtarefas SET statusTarefa = 1 WHERE (idTarefa = $idTarefa)";

    mysqli_query($conexao, $sql) or die ("Erro ao execultar a consulta.".mysqli_error($conexao));

    echo "A tarefa foi concluida com suceso";

    mysqli_close($conexao);
?>