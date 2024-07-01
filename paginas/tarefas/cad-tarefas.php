<header>
    <h3><i class="bi bi-list-task"></i> Cadastro de tarefas</h3>
</header>
<div>
    <form action="index.php?menuop=inserir-tarefas" method="post">
        <div class="mb-5">
            <label for="tituloTarefa" class="form-label">Titulo da Tarefa</label>
            <input type="text" name="tituloTarefa" id="tituloTarefa" class="form-control" required>
        </div>
        <div class="mb-5">
            <label for="descricaoTarefa" class="form-label">Descrição da Tarefa</label>
            <input type="text" name="descricaoTarefa" id="descricaoTarefa" class="form-control" required>
        </div>
        <div class="mb-5">
            <label for=""></label>
        </div>
        <div class="mb-3">
            <input class="btn btn-success" type="submit" value="Adicionar">
        </div>

    </form>
</div>
