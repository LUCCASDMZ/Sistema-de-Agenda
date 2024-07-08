<header>
    <h3><i class="bi bi-list-task"></i> Atualizar Tarefa</h3>
</header>

<?php 
    
    $idTarefa = strip_tags( mysqli_real_escape_string($conexao, $_POST["idTarefa"]));
    $tituloTarefa = strip_tags( mysqli_real_escape_string($conexao, $_POST["tituloTarefa"]));
    $descricaoTarefa = strip_tags( mysqli_real_escape_string($conexao, $_POST["descricaoTarefa"]));
    $dataConclusaoTarefa = strip_tags( mysqli_real_escape_string($conexao, $_POST['dataConclusaoTarefa']));
    $horaConclusaoTarefa = strip_tags( mysqli_real_escape_string($conexao, $_POST['horaConclusaoTarefa']));
    $dataLembreteTarefa = strip_tags( mysqli_real_escape_string($conexao, $_POST['dataLembreteTarefa']));
    $horaLembreteTarefa = strip_tags( mysqli_real_escape_string($conexao, $_POST['horaLembreteTarefa']));
    $recorrenciaTarefa = strip_tags( mysqli_real_escape_string($conexao, $_POST['recorrenciaTarefa']));
    

    $sql = "UPDATE tbtarefas SET
            tituloTarefa = '$tituloTarefa',
            descricaoTarefa = '$descricaoTarefa',
            dataConclusaoTarefa = '$dataConclusaoTarefa',
            horaConclusaoTarefa = '$horaConclusaoTarefa',
            dataLembreteTarefa = '$dataLembreteTarefa',
            horaLembreteTarefa = '$horaLembreteTarefa',
            recorrenciaTarefa = '$recorrenciaTarefa'
            WHERE idTarefa = '$idTarefa'
            ";

            $rs = mysqli_query($conexao, $sql) or die ("Erro ao execultar a consulta.".mysqli_error($conexao));

            if($rs){
                ?>
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Tarefa atualizada com sucesso.</h4>
                        <hr>
                        <p class="mb-0"><a href="index.php?menuop=tarefas">Voltar para lista de tarefas</a>.</p>
                    </div>
                <?php 
            }
            else{
                echo "Erro ao inserir, tente novamente mais tarde";
            }

            // Fecha a conexão com o banco de dados
            mysqli_close($conexao);