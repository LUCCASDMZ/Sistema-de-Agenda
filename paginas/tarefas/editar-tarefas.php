<?php 

    $idTarefa = (isset($_GET['idTarefa']))?$_GET['idTarefa'] : 0;
    
    $sql = "SELECT * FROM tbtarefas WHERE idTarefa = $idTarefa";
    $resultado = mysqli_query($conexao, $sql);
    $dados = mysqli_fetch_assoc($resultado);
    
?>


<header>
    <h3><i class="bi bi-list-task"></i> Editar Tarefas</h3>
</header>
<div>
    <form class="needs-validation" action="index.php?menuop=atualizar-tarefas" method="post" novalidate>
        <input type="hidden" name="idTarefa" value="<?= htmlspecialchars($idTarefa) ?>">
        <div class="mb-5">
            <label for="tituloTarefa" class="form-label">Titulo da Tarefa</label>
            <input type="text" name="tituloTarefa" id="tituloTarefa" class="form-control" required value="<?=$dados['tituloTarefa']?>">
        </div>
        <div class="mb-3">
            <label for="descricaoTarefa" class="form-label">Descrição</label>
            <textarea class="form-control" name="descricaoTarefa" id="descricaoTarefa" cols="30" rows="5" required><?=$dados['descricaoTarefa']?></textarea>
        </div>
        <div class="row">
            <div class="mb-3 col-3">
                <label for="dataConclusaoTarefa" class="form-label">Data de Conclusão da Tarefa</label>
                <input class="form-control" type="date" name="dataConclusaoTarefa" id="dataConclusaoTarefa" required value="<?=$dados['dataConclusaoTarefa']?>">
            </div>
            <div class="mb-3 col-3">
                <label for="horaConclusaoTarefa" class="form-label">Hora de Conclusão da Tarefa</label>
                <input class="form-control" type="time" name="horaConclusaoTarefa" id="horaConclusaoTarefa" required value="<?=$dados['horaConclusaoTarefa']?>">
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-3">
                <label for="dataLembreteTarefa" class="form-label">Data de Lembrete da Tarefa</label>
                <input class="form-control" type="date" name="dataLembreteTarefa" id="dataLembreteTarefa" value="<?=$dados['dataLembreteTarefa']?>">
            </div>
            <div class="mb-3 col-3">
                <label for="horaLembreteTarefa" class="form-label">Hora de Lembrete da Tarefa</label>
                <input class="form-control" type="time" name="horaLembreteTarefa" id="horaLembreteTarefa" value="<?=$dados['horaLembreteTarefa']?>">
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-3">
                <label for="recorrenciaTarefa" class="form-label">Recorrencia</label>
                <select class="form-control" name="recorrenciaTarefa" id="recorrenciaTarefa">
                    <option <?php echo ($dados["recorrenciaTarefa"] == '0')?'selected':'' ?> value="0">Não recorrente</option>
                    <option <?php echo ($dados["recorrenciaTarefa"] == '1')?'selected':'' ?> value="1">Diaramente</option>
                    <option <?php echo ($dados["recorrenciaTarefa"] == '2')?'selected':'' ?> value="2">Semanalmente</option>
                    <option <?php echo ($dados["recorrenciaTarefa"] == '3')?'selected':'' ?> value="3">Mensalmente</option>
                    <option <?php echo ($dados["recorrenciaTarefa"] == '4')?'selected':'' ?> value="4">Anualmente</option>
                </select>
            </div>
        </div>
        <div class="mb-3">
            <input class="btn btn-success" type="submit" value="Adicionar">
        </div>
    </form>
</div>
    