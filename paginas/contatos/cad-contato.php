<header>
    <h3>Cadastro de Contato</h3>
</header>
<div>
    <form action="index.php?menuop=inserir-contato" method="post">
        <div>
            <label for="nomeContato">Nome</label>
            <input type="text" name="nomeContato" required id="nomeContato">
        </div>
        <div>
            <label for="emailContato">E-mail</label>
            <input type="email" name="emailContato" required id="emailContato">
        </div>
        <div>
            <label for="telefoneContato">Telefone</label>
            <input type="text" name="telefoneContato" required id="telefoneContato">
        </div>
        <div>
            <label for="enderecoContato">Endereço</label>
            <input type="text" name="enderecoContato" required id="enderecoContato">
        </div>
        <div>
            <label for="sexoContato">Sexo</label>
            <input type="text" name="sexoContato" required id="sexoContato">
        </div>
        <div>
            <label for="dataNascContato">Data de Nascimento</label>
            <input type="date" name="dataNascContato" required id="dataNascContato">
        </div>
        <div>
            <input type="submit" value="Adicionar" name="btnAdicionar">
        </div>
    </form>
</div>