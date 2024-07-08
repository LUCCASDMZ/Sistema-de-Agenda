<header>
    <h3>Excluir Tarefas</h3>
</header>

<?php 
    $idTarefa = mysqli_real_escape_string($conexao, $_GET['idTarefa']);
    
    $sql = "DELETE FROM tbtarefas WHERE idTarefa = $idTarefa";

    $rs = mysqli_query($conexao, $sql) or die ("Erro ao execultar a consulta.".mysqli_error($conexao));

    if($rs){
        ?>
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Tarefa excluida com sucesso</h4>
                <hr>
                <p class="mb-0"><a href="index.php?menuop=tarefas">Voltar para lista de tarefas</a>.</p>
            </div>
        <?php 
    }
    else{
        echo "Erro ao inserir, tente novamente mais tarde";
    }
?>
    