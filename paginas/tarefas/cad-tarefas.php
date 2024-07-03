<header>
    <h3><i class="bi bi-list-task"></i> Cadastro de tarefas</h3>
</header>
<div>
    <form class="needs-validation" action="index.php?menuop=inserir-tarefas" method="post" novalidate>
        <div class="mb-5">
            <label for="tituloTarefa" class="form-label">Titulo da Tarefa</label>
            <input type="text" name="tituloTarefa" id="tituloTarefa" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="descricaoTarefa" class="form-label">Descrição</label>
            <textarea class="form-control" name="descricaoTarefa" id="descricaoTarefa" cols="30" rows="5" required></textarea>
        </div>
        <div class="row">
            <div class="mb-3 col-3">
                <label for="dataConclusaoTarefa" class="form-label">Data de Conclusão da Tarefa</label>
                <input class="form-control" type="date" name="dataConclusaoTarefa" id="dataConclusaoTarefa" required>
            </div>
            <div class="mb-3 col-3">
                <label for="horaConclusaoTarefa" class="form-label">Hora de Conclusão da Tarefa</label>
                <input class="form-control" type="time" name="horaConclusaoTarefa" id="horaConclusaoTarefa" required>
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-3">
                <label for="dataLembreteTarefa" class="form-label">Data de Lembrete da Tarefa</label>
                <input class="form-control" type="date" name="dataLembreteTarefa" id="dataLembreteTarefa">
            </div>
            <div class="mb-3 col-3">
                <label for="horaLembreteTarefa" class="form-label">Hora de Lembrete da Tarefa</label>
                <input class="form-control" type="time" name="horaLembreteTarefa" id="horaLembreteTarefa">
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-3">
                <label for="recorrenciaTarefa" class="form-label">Recorrencia</label>
                <select class="form-control" name="recorrenciaTarefa" id="recorrenciaTarefa">

                    <option value="0">Não recorrente</option>
                    <option value="1">Diaramente</option>
                    <option value="2">Semanalmente</option>
                    <option value="3">Mensalmente</option>
                    <option value="4">Anualmente</option>
                </select>
            </div>
        </div>
        <div class="mb-3">
            <input class="btn btn-success" type="submit" value="Adicionar">
        </div>
    </form>
</div>
