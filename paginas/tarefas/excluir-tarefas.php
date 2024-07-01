<header>
    <h3>Excluir Tarefas</h3>
</header>

<?php 
    $idTarefa = mysqli_real_escape_string($conexao, $_GET['idTarefa']);
    
    $sql = "DELETE FROM tbtarefas WHERE idTarefa = $idTarefa";

    mysqli_query($conexao, $sql) or die ("Erro ao execultar a consulta.".mysqli_error($conexao));

    echo "A tarefa foi excluida com suceso";

    mysqli_close($conexao);
?>
    